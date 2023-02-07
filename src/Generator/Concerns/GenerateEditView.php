<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

trait GenerateEditView
{
    private function generateEditView(): void
    {
        $this->generateStubs(
            $this->stubPath . "edit.stub",
            $this->moduleName ? module_path($this->moduleName) . "/Tomato/Resources/{$this->modelName}Resource/Pages/Edit.php" : app_path("Tomato/Resources/{$this->modelName}Resource/Pages/Edit.php"),
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
