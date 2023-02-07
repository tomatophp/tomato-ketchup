<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;

trait AfterQuery
{
    public function afterIndexQuery($query, Request $request, array $rows): void
    {
        //
    }
}
