<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Destroy;

use Illuminate\Http\Request;

trait After
{
    public function afterDestroy(Request $request, $id): void
    {
        //
    }
}
