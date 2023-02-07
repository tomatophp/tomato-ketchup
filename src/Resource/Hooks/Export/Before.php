<?php

namespace Tomatophp\TomatoKetchup\Resource\Hooks\Export;

use Illuminate\Http\Request;

trait Before
{
    public function beforeExport(Request $request, $record): Request
    {
        return $request;
    }
}
