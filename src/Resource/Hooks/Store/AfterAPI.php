<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Store;

use Illuminate\Http\Request;

trait AfterAPI
{
    public function afterStoreAPI(Request $request, $record): void
    {
        //
    }
}
