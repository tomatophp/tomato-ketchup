<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait BeforeQueryAPI
{
    public function beforeShowQueryAPI($query, Request $request,array $rows): void
    {
        //
    }
}
