<?php

namespace Tomatophp\TomatoKetchup\Fields\Concerns;

trait HasDateTime
{
    public bool|null $date=false;

    public function date(bool|null $date=true): static
    {
        $this->date = $date;
        return $this;
    }

    public bool|null $time=false;

    public function time(bool|null $time=true): static
    {
        $this->time = $time;
        return $this;
    }

    public function datetime(bool|null $date=true, bool|null $time=true): static
    {
        $this->date = $date;
        $this->time = $time;
        return $this;
    }

}
