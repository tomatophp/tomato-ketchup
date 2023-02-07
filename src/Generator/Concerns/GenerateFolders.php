<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait GenerateFolders
{
    private function generateFolders(): void
    {
        if($this->moduleName){
            $folders = [
                module_path($this->moduleName) ."/Http/Controllers/",
                module_path($this->moduleName) . "/Resources/views/" . str_replace('_', '-', $this->tableName),
                module_path($this->moduleName) . "/Menus",
                module_path($this->moduleName) ."/Http/Requests",
                module_path($this->moduleName) . "/Routes",
                module_path($this->moduleName)."/Tables"
            ];
        }
        else {
            $folders = [
                app_path("Tomato"),
                app_path("Tomato/Resources"),
                app_path("Tomato/Resources") . '/'.$this->modelName . "Resource",
                app_path("Tomato/Resources") . '/'.$this->modelName . "Resource/Pages",
            ];
        }

        foreach($folders as $folder){
            if(!File::exists($folder)){
                File::makeDirectory($folder);
            }
        }
    }
}
