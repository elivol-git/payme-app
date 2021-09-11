<?php

namespace App\Services;

use App\Models\PaymentResponse;
use Illuminate\Http\Request;


class PaymentService
{

    public function saleProcess(Request $paymentRequest) :PaymentResponse
    {
        try {
            $this->validateInputValues($paymentRequest);

            $saleResponse = $this->callServiceApi($paymentRequest);

            (new PaymentStoreService())->savePaymentResponse($saleResponse, $paymentRequest);

        } catch (\Exception $exception) {
            $saleResponse = $this->failedCall($exception);
        }
        return $saleResponse;
    }

    /**
     * @throws \Exception
     */
    private function validateInputValues(Request $paymentRequest): void
    {
        if (!$paymentRequest->input('product_name') || !$paymentRequest->input('sale_price') || !$paymentRequest->input('currency')) {
            throw new \Exception('Please provide sale details', -1);
        }
    }

    private function callServiceApi(Request $request) :PaymentResponse
    {
        $client = new \GuzzleHttp\Client([
            'Content-type' => 'application/json; charset=utf-8',
            'Accept' => 'application/json',
            'http_errors' => false
        ]);
        $url = "https://preprod.paymeservice.com/api/generate-sale";

        $saleBody['seller_payme_id'] = 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N';
        $saleBody['currency'] = $request->input('currency');
        $saleBody['product_name'] = $request->input('product_name');
        $saleBody['sale_price'] = $request->input('sale_price') * 100;
        $saleBody['installments'] = 1;
        $saleBody['language'] = 'en';
        $response = $client->post($url, ['json'=>(object)$saleBody]);
        return $this->buildResponse($response);
    }

    private function buildResponse($response) :PaymentResponse
    {
        $body = $response->getBody();
        $responseData = json_decode($body->getContents());

        $saleResponse = new PaymentResponse();
        $saleResponse->setStatusCode($responseData->status_code);

        if ($saleResponse->statusCode() !== 0) {
            throw new \Exception($responseData->status_error_details, $responseData->status_error_code);
        }

        $saleResponse->setSaleUrl($responseData->sale_url);
        $saleResponse->setPaymeSaleId($responseData->payme_sale_id);
        $saleResponse->setPaymeSaleCode($responseData->payme_sale_code);
        $saleResponse->setPrice($responseData->price);
        $saleResponse->setTransactionId($responseData->transaction_id);
        $saleResponse->setCurrency($responseData->currency);
        $saleResponse->setSalePaymentMethod($responseData->sale_payment_method);

        return $saleResponse;
    }

    private function failedCall(\Exception $exception) :PaymentResponse
    {
        $saleResponse = new PaymentResponse();
        $saleResponse->setStatusErrorDetails($exception->getMessage());
        $saleResponse->setStatusCode($exception->getCode());
        $saleResponse->setStatusErrorCode($exception->getCode());

        return $saleResponse;
    }


}
