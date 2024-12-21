<?php

namespace ClickSendSms;

use Illuminate\Support\ServiceProvider;
use AdrianoGF\ClickSendSms\Services\HttpClientHandler;
use AdrianoGF\ClickSendSms\Services\SmsService;

class ClickSendSmsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/clicksend.php', 'clicksend');

        $this->app->singleton('clicksendsms', function ($app) {
            $httpHandler = new HttpClientHandler();
            return new SmsService($httpHandler);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/clicksend.php' => config_path('clicksend.php'),
        ]);
    }
}