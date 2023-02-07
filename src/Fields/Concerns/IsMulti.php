<?php

namespace Tomatophp\TomatoKetchup\Fields\Concerns;


trait IsMulti
{
    public bool|null $multi=false;

    public function multi(bool|null $multi=true): static
    {
        $this->multi = $multi;
        return $this;
    }
}
