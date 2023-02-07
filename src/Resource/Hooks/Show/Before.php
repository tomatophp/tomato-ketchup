<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait Before
{
    public function beforeShow(Request $request, $record)
    {
        return $record;
    }
}
