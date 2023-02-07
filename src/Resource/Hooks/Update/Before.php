<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Update;

use Illuminate\Http\Request;

trait Before
{
    public function beforeUpdate(Request $request, $record): Request
    {
        return $request;
    }
}
