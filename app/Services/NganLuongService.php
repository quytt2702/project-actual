<?php

namespace App\Services;

class NganLuongService extends BaseService
{
    use Concerns\NganLuong\WithDefaultParams;

    protected $config = [];

    public function __construct()
    {
        $this->config = config('ngan_luong', []);

        parent::__construct();
    }

    public function baseUri()
    {
        return $this->config['api_url'];
    }

    public function getResponse()
    {
        if (! $this->response) {
            return null;
        }

        try {
            $contents = $this->response->getBody()->getContents();

            return simplexml_load_string($contents);
        } catch (\Exception $ex) {
            return null;
        }
    }

    public function checkOut($payload = [])
    {
        $options = array_merge($this->getCheckOutDefaultParams(), $payload);

        return $this->post('checkoutseamless.api.nganluong.post.php', $options);
    }

    public function authTransaction($payload = [])
    {
        $options = array_merge($this->getAuthTransactionDefaultParams(), $payload);

        return $this->post('checkoutseamless.api.nganluong.post.php', $options);
    }
}
