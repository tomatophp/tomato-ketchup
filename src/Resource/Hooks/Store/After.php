<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Store;

use Illuminate\Http\Request;

trait After
{
    public function afterStore(Request $request, $record): void
    {
        //
    }
}
