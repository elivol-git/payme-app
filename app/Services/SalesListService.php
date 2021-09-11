<?php
namespace App\Services;

class SalesListService
{
    public function getList(): \Illuminate\Support\Collection
    {
        $paymentStore = new PaymentStoreService();
        return $paymentStore->getSales();
    }
}
