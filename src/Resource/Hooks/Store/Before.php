<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Store;

use Illuminate\Http\Request;

trait Before
{
    public function beforeStore(Request $request): Request
    {
        return $request;
    }
}
