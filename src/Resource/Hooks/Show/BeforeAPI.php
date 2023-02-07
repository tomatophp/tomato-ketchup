<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait BeforeAPI
{
    public function beforeShowAPI(Request $request, $record)
    {
        return $record;
    }
}
