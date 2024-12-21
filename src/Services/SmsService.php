<?php

namespace ClickSendSms\Services;

class SmsService
{
    protected $httpHandler;

    public function __construct(HttpClientHandler $httpHandler)
    {
        $this->httpHandler = $httpHandler;
    }

    public function sendSms($to, $message)
    {
        $response = $this->httpHandler->post('sms/send', [
            'messages' => [
                [
                    'source' => 'php',
                    'from' => 'MyApp',
                    'body' => $message,
                    'to' => $to,
                    'schedule' => null
                ]
            ]
        ]);

        return $response->json();
    }

    public function calculateSmsPrice($to, $message)
    {
        $response = $this->httpHandler->post('sms/price', [
            'messages' => [
                [
                    'body' => $message,
                    'to' => $to
                ]
            ]
        ]);

        return $response->json();
    }
}