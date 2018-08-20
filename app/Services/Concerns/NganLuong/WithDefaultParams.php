<?php

namespace App\Services\Concerns\NganLuong;

trait WithDefaultParams
{
    public function getDefaultParams()
    {
        return [
            'version' => $this->config['version'],
            'merchant_id' => $this->config['merchant_id'],
            'merchant_password' => md5($this->config['merchant_password']),
        ];
    }

    public function getCheckOutDefaultParams()
    {
        return array_merge($this->getDefaultParams(), [
            'receiver_email' => $this->config['receiver_email'],
            'function' => 'SetExpressCheckout',
        ]);
    }

    public function getAuthTransactionDefaultParams()
    {
        return array_merge($this->getDefaultParams(), [
            'function' => 'AuthenTransaction',
        ]);
    }
}
