<?php

namespace App\Services;

use App\Models\PaymentResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentStoreService
{

    public function savePaymentResponse(PaymentResponse $paymentResponse, Request $paymentRequest )
    {
        DB::table('sales')->insertOrIgnore([
            'payme_sale_id' => $paymentResponse->paymeSaleId(),
            'sale_url' => $paymentResponse->saleUrl(),
            'payme_sale_code' => $paymentResponse->paymeSaleCode(),
            'price' => $paymentResponse->price(),
            'transaction_id' => $paymentResponse->transactionId(),
            'currency' => $paymentResponse->currency(),
            'sale_payment_method' => $paymentResponse->salePaymentMethod(),
            'product_name' => $paymentRequest->input('product_name'),
            'input_price' => $paymentRequest->input('sale_price'),
        ]);
    }

    public function getSales(int $offset=0,int $limit=100): \Illuminate\Support\Collection
    {
        return DB::table('sales')
            ->orderBy('created_at', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
}
