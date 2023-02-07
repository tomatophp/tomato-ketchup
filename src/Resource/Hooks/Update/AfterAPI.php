<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Update;

use Illuminate\Http\Request;

trait AfterAPI
{
    public function afterUpdateAPI(Request $request, $record): void
    {
        //
    }
}
