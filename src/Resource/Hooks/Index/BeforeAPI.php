<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait BeforeAPI
{
    public function beforeIndexAPI(Request $request): Request
    {
        return $request;
    }
}
