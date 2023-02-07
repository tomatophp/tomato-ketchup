<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

use Illuminate\Support\Str;

trait GenerateResource
{
    use GenerateField;

    /**
     * @return void
     */
    private function generateResource(): void
    {
        $this->generateStubs(
            $this->stubPath . "resource.stub",
            $this->moduleName ? module_path($this->moduleName) ."/Tomato/Resources/{$this->modelName}Resource.php" : app_path("Tomato/Resources/{$this->modelName}Resource.php"),
            [
                "name" => "{$this->modelName}Resource",
                "model_namespace" => $this->moduleName ? "\\Modules\\".$this->moduleName."\\Entities" : "\\App\\Models",
                "model" => $this->modelName,
                "title" => $this->modelName,
                "fields" => $this->generateFields(),
                "table" => str_replace('_', '-', $this->tableName),
                "namespace" => $this->moduleName ? "Modules\\".$this->moduleName."\\Tomato\\Resources": "App\\Tomato\\Resources",
            ],
            [
                $this->moduleName ? module_path($this->moduleName) ."/Tomato/Resources/" : app_path("Tomato/Resources/")
            ]
        );
    }

    /**
     * @param bool $view
     * @return string
     */
    private function generateFields(bool $view=false): string
    {
        $fields = collect([]);
        foreach($this->cols as $key=>$item){
            $fields->push($this->generateField(
                item :$item
            ));
        }
        return $fields->implode("\n");
    }
}
