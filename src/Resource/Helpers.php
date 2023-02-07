<?php

namespace TomatoPHP\TomatoKetchup\Resource;



use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

trait Helpers
{
    /**
     * @return Stringable
     */
    private function generateTitle(): Stringable
    {
        return Str::of($this->title);
    }
}
