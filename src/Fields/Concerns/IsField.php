<?php

namespace Tomatophp\TomatoKetchup\Fields\Concerns;

trait IsField
{
    public string $name;

    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public string $type="text";

    public function type(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public string|null $label="";

    public function label(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public string|null $placeholder="";

    public function placeholder(string $placeholder): static
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public string|null $hint="";

    public function hint(string $hint): static
    {
        $this->hint = $hint;
        return $this;
    }

    public string|array $style;

    public function style(string|array $style): static
    {
        $this->style = $style;
        return $this;
    }
}
