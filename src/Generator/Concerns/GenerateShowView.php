<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

trait GenerateShowView
{
    /**
     * @return void
     */
    private function generateShowView(): void
    {
        $this->generateStubs(
            $this->stubPath . "show.stub",
            $this->moduleName ? module_path($this->moduleName) . "/Tomato/Resources/{$this->modelName}Resource/Pages/Show.php" : app_path("Tomato/Resources/{$this->modelName}Resource/Pages/Show.php"),
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
