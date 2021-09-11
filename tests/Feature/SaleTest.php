<?php

namespace Tests\Feature;

use App\Models\PaymentResponse;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Tests\TestCase;

class SaleTest extends TestCase
{

    public function test_sale_page():void
    {
        $response = $this->get('/sale');

        $response->assertStatus(200);
    }

    public function test_payment_service_response_correct_response_type():void
    {
        $paymentRequest = new Request();
        $this->assertInstanceOf(
            PaymentResponse::class,
            (new PaymentService)->saleProcess($paymentRequest)
        );
    }

    public function test_payment_process_succeed_with_correct_input():void
    {
        $this->inputTest(['product_name'=> 'Tesla car', 'sale_price'=> 200000, 'currency'=> 'ILS'], 0);
    }

    public function test_payment_process_failed_with_missing_currency():void
    {
        $this->inputTest(['product_name'=> 'Tesla car', 'sale_price'=> 200,], -1);
    }

    public function test_payment_process_failed_with_missing_product_name():void
    {
        $this->inputTest([ 'sale_price'=> 200, 'currency'=> 'ILS'], -1);
    }

    public function test_payment_process_failed_with_min_bounds_price():void
    {
        $this->inputTest(['product_name'=> 'Tesla car', 'sale_price'=> 0.1, 'currency'=> 'ILS'], 352);
    }

    public function test_payment_process_failed_with_max_bounds_price():void
    {
        $this->inputTest(['product_name'=> 'Tesla car', 'sale_price'=> 9999999999, 'currency'=> 'ILS'], 352);
    }

    public function test_payment_process_failed_with_non_supported_currency():void
    {
        $this->inputTest(['product_name'=> 'Tesla car', 'sale_price'=> 999, 'currency'=> 'AUD'], 252);
    }

    private function inputTest(array $input, int $expectedValue)
    {
        //Given
        $paymentRequest = $this->createRequest('POST', [], '/sale', [], $input);

        //When
        $paymentResponse = (new PaymentService)->saleProcess($paymentRequest);

        //Then
        $this->assertEquals(
            $expectedValue, $paymentResponse->statusCode(),
        );
    }

    protected function createRequest(
        $method,
        $content,
        $uri = '/',
        $server = ['CONTENT_TYPE' => 'application/form'],
        $parameters = [],
        $cookies = [],
        $files = []
    ):Request {
        $request = new Request;
        return $request->createFromBase(
            \Symfony\Component\HttpFoundation\Request::create(
                $uri,
                $method,
                $parameters,
                $cookies,
                $files,
                $server,
                $content
            )
        );
    }

    public function test_payment_page():void
    {
        $response = $this->post('/payment');

        $response->assertStatus(200);
    }

    public function test_sales_list_page():void
    {
        $response = $this->get('/sales-list');

        $response->assertStatus(200);
    }
}
