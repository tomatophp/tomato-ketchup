<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

trait GenerateCreateView
{
    private function generateCreateView(): void
    {
        $this->generateStubs(
            $this->stubPath . "create.stub",
            $this->moduleName ? module_path($this->moduleName) . "/Tomato/Resources/{$this->modelName}Resource/Pages/Create.php" : app_path("Tomato/Resources/{$this->modelName}Resource/Pages/Create.php"),
            [
                "namespace" => $this->moduleName ? "Modules\\".$this->moduleName."\\Tomato\\Resources": "App\\Tomato\\Resources",
                "resource" => $this->modelName.'Resource',
            ],
            [
                $this->moduleName ? module_path($this->moduleName) . "/Tomato/Resources/{$this->modelName}Resource/Pages" : app_path("Tomato/Resources/{$this->modelName}Resource/Pages")
            ]
        );
    }
}
