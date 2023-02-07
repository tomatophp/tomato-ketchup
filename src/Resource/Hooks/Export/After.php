<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Export;

use Illuminate\Http\Request;

trait After
{
    public function afterExport(Request $request, $record): void
    {
        //
    }
}
