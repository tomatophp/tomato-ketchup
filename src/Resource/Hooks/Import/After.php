<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Import;

use Illuminate\Http\Request;

trait After
{
    public function afterImport(Request $request, $record): void
    {
        //
    }
}
