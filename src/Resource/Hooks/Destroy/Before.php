<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Destroy;

use Illuminate\Http\Request;

trait Before
{
    public function beforeDestroy(Request $request, $record): Request
    {
        return $request;
    }
}
