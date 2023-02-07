<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Import;

use Illuminate\Http\Request;

trait Before
{
    public function beforeImport(Request $request, $record): Request
    {
        return $request;
    }
}
