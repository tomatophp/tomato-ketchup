<?php

namespace Tomatophp\TomatoKetchup\Fields\Concerns;

trait HasValidation
{
    public bool $required=false;

    public function required(bool $required=true): static
    {
        $this->required = $required;
        return $this;
    }

    public string|null $unique="";

    public function unique(bool $unique=true): static
    {
        $this->unique = $unique;
        return $this;
    }

    public string|array $rules="";

    public function rules(string|array $rules): static
    {
        $this->rules = $rules;
        return $this;
    }

    public string|array $createRules="";


    public function createRules(string|array $createRules): static
    {
        $this->createRules = $createRules;
        return $this;
    }

    public string|array $editRules="";

    public function editRules(string|array $editRules): static
    {
        $this->editRules = $editRules;
        return $this;
    }

}
