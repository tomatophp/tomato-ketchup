<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Update;

use Illuminate\Http\Request;

trait BeforeAPI
{
    public function beforeUpdateAPI(Request $request, $record): Request
    {
        return $request;
    }
}
