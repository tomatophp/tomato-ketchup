<?php

namespace TomatoPHP\TomatoKetchup\Fields\Concerns;

trait HasOptions
{
    public array $options=[];

    public function options(array $options): static
    {
        $this->options = $options;
        return $this;
    }

}
