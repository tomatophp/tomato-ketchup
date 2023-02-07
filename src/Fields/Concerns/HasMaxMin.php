<?php

namespace TomatoPHP\TomatoKetchup\Fields\Concerns;

trait HasMaxMin
{
    public int|null $max=null;

    public function max(int|null $max): static
    {
        $this->max = $max;
        return $this;
    }

    public int|null $min=null;

    public function min(int|null $min): static
    {
        $this->min = $min;
        return $this;
    }

    public function between(int|null $min, int|null $max): static
    {
        $this->min = $min;
        $this->max = $max;
        return $this;
    }

}
