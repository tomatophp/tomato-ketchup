<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait AfterQueryAPI
{
    public function afterShowQueryAPI($record, Request $request, array $rows): void
    {
        //
    }
}
