<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Store;

use Illuminate\Http\Request;

trait BeforeAPI
{
    public function beforeStoreAPI(Request $request): Request
    {
        return $request;
    }
}
