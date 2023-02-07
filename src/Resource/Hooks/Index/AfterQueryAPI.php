<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait AfterQueryAPI
{
    public function afterIndexQueryAPI($query, Request $request, array $rows): void
    {
        //
    }
}
