<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait After
{
    public function afterIndex(LengthAwarePaginator $data,Request $request): void
    {
        //
    }
}
