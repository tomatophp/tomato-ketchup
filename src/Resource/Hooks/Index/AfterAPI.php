<?php

namespace TomatoPHP\TomatoKetchup\Resource\Hooks\Index;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

trait AfterAPI
{
    public function afterIndexAPI(LengthAwarePaginator $data,Request $request): void
    {
        //
    }
}
