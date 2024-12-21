<?php

namespace ClickSendSms\Facades;

use Illuminate\Support\Facades\Facade;

class ClickSendSms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'clicksendsms';
    }
}