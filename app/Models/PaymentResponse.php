<?php

namespace App\Models;

class PaymentResponse
{
    private $statusCode;
    private $saleUrl;
    private $paymeSaleId;
    private $paymeSaleCode;
    private $price;
    private $transactionId;
    private $currency;
    private $salePaymentMethod;
    private $statusErrorDetails;
    private $statusAdditionalInfo;
    private $statusErrorCode;

    public function statusCode():int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode):PaymentResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function saleUrl()
    {
        return $this->saleUrl;
    }

    /**
     * @param mixed $saleUrl
     * @return PaymentResponse
     */
    public function setSaleUrl($saleUrl)
    {
        $this->saleUrl = $saleUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function paymeSaleId()
    {
        return $this->paymeSaleId;
    }

    /**
     * @param mixed $paymeSaleId
     * @return PaymentResponse
     */
    public function setPaymeSaleId($paymeSaleId)
    {
        $this->paymeSaleId = $paymeSaleId;
        return $this;
    }

    public function paymeSaleCode():?int
    {
        return $this->paymeSaleCode;
    }

    public function setPaymeSaleCode(int $paymeSaleCode):PaymentResponse
    {
        $this->paymeSaleCode = $paymeSaleCode;
        return $this;
    }

    public function price():?int
    {
        return $this->price;
    }

    public function setPrice(int $price):PaymentResponse
    {
        $this->price = $price;
        return $this;
    }

    public function transactionId():?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId):PaymentResponse
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function currency():string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency):PaymentResponse
    {
        $this->currency = $currency;
        return $this;
    }

    public function salePaymentMethod():string
    {
        return $this->salePaymentMethod;
    }

    public function setSalePaymentMethod(string $salePaymentMethod):PaymentResponse
    {
        $this->salePaymentMethod = $salePaymentMethod;
        return $this;
    }

    public function statusErrorDetails(): ?string
    {
        return $this->statusErrorDetails;
    }

    public function setStatusErrorDetails(string $statusErrorDetails):PaymentResponse
    {
        $this->statusErrorDetails = $statusErrorDetails;
        return $this;
    }

    public function statusAdditionalInfo():?int
    {
        return $this->statusAdditionalInfo;
    }

    public function setStatusAdditionalInfo(int $statusAdditionalInfo):PaymentResponse
    {
        $this->statusAdditionalInfo = $statusAdditionalInfo;
        return $this;
    }

    public function statusErrorCode():?int
    {
        return $this->statusErrorCode;
    }

    public function setStatusErrorCode(int $statusErrorCode):PaymentResponse
    {
        $this->statusErrorCode = $statusErrorCode;
        return $this;
    }

}
