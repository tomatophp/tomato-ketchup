<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait BeforeQuery
{
    public function beforeIndexQuery($query, Request $request, array $rows): void
    {
        //
    }
}
