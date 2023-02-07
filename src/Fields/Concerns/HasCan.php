<?php

namespace TomatoPHP\TomatoKetchup\Fields\Concerns;

trait HasCan
{
    public bool $list=true;

    public function list(bool $list=false): static
    {
        $this->list = $list;
        return $this;
    }

    public bool $create=true;

    public function create(bool $create=false): static
    {
        $this->create = $create;
        return $this;
    }

    public bool $edit=true;

    public function edit(bool $edit=false): static
    {
        $this->edit = $edit;
        return $this;
    }

    public bool $show=true;

    public function show(bool $show=false): static
    {
        $this->show = $show;
        return $this;
    }

}
