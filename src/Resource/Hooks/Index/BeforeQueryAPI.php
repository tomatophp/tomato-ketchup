<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait BeforeQueryAPI
{
    public function beforeIndexQueryAPI($query, Request $request,array $rows): void
    {
        //
    }
}
