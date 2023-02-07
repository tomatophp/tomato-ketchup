<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait Before
{
    public function beforeIndex(Request $request): Request
    {
        return $request;
    }
}
