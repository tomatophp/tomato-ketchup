<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Show;

use Illuminate\Http\Request;

trait BeforeQuery
{
    public function beforeShowQuery($query, Request $request, array $rows): void
    {
        //
    }
}
