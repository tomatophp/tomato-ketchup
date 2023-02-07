<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Bulk;

use Illuminate\Http\Request;

trait Before
{
    public function beforeBulk(Request $request): Request
    {
        return $request;
    }
}
