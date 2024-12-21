<?php

namespace ClickSendSms\Services;

use Illuminate\Support\Facades\Http;

class HttpClientHandler
{
    protected $httpClient;
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = 'https://rest.clicksend.com/v3/';
        $this->httpClient = Http::withBasicAuth(config('clicksend.username'), config('clicksend.token'));
    }

    public function post(string $uri, array $data)
    {
        $response = $this->httpClient->post("{$this->baseUri}{$uri}", $data);
        return $response;
    }
}