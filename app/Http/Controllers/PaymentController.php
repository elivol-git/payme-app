<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Services\SalesListService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function sale(Request $request) {
        $paymentService = new PaymentService();
        $paymentResponse = $paymentService->saleProcess( $request );
        return view('payment', [
            'title' => 'Payment Result',
            'status_code'=>$paymentResponse->statusCode(),
            'sale_url'=>$paymentResponse->saleUrl(),
            'status_error_details'=>$paymentResponse->statusErrorDetails(),
            'status_additional_info'=>$paymentResponse->statusAdditionalInfo(),
        ]);
    }

    public function salesList()
    {
        $salesListService = new SalesListService();
        $salesList = $salesListService->getList();
//        print_r($salesList);
        return view('sales-list', [
            'salesList' => $salesList,
        ]);
    }
}
