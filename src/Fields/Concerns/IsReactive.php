<?php

namespace TomatoPHP\TomatoKetchup\Fields\Concerns;

trait IsReactive
{
    public bool|null $reactive=false;

    public function reactive(bool|null $reactive=true): static
    {
        $this->reactive = $reactive;
        return $this;
    }

    public string|null $reactiveField="";

    public function reactiveField(string $reactiveField): static
    {
        $this->reactiveField = $reactiveField;
        return $this;
    }

    public string|null $reactiveWhere="";

    public function reactiveWhere(string $reactiveWhere): static
    {
        $this->reactiveWhere = $reactiveWhere;
        return $this;
    }
}
