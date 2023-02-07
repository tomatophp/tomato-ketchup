<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait AfterQuery
{
    public function afterShowQuery($record, Request $request, array $rows): void
    {
        //
    }
}
