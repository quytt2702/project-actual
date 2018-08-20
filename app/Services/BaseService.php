<?php

namespace App\Services;

use GuzzleHttp\Client;

abstract class BaseService
{
    protected $client = null;
    protected $response = null;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri(),
        ]);
    }

    abstract public function baseUri();

    public function get($path, $query = [], $options = [])
    {
        $options = array_merge($options, [
            'query' => $query,
        ]);

        $this->response = $this->client->request('GET', $path, $options);

        return $this;
    }

    public function post($path, $payload = [], $options = [])
    {
        $options = array_merge($options, [
            'form_params' => $payload,
        ]);

        $this->response = $this->client->request('POST', $path, $options);

        return $this;
    }

    public function getResponse()
    {
        if (! $this->response) {
            return null;
        }

        return json_decode($this->response->getBody()->getContents());
    }
}
