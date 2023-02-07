<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Update;

use Illuminate\Http\Request;

trait After
{
    public function afterUpdate(Request $request, $record): void
    {
        //
    }
}
