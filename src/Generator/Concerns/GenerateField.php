<?php

namespace TomatoPHP\TomatoKetchup\Generator\Concerns;

use Illuminate\Support\Str;

trait GenerateField
{

    private function generateField(
        array $item,
    ): string
    {
        $field = collect([]);
        if($item['type'] === 'textarea'){
            $field->push("            Fields\Textarea::make('" . $item['name'] . "')");
            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }
            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'longText'){
            $field->push("            Fields\Rich::make('" . $item['name'] . "')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }
            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'relation'){
            $field->push("            Fields\Select::make('" . $item['name'] . "')");


            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'enum'){
            $field->push("            Fields\Select::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default([])");
            }
        }
        elseif($item['type'] === 'json'){
            $field->push("            Fields\Trans::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('')");
            }
        }
        elseif($item['type'] === 'boolean'){
            $field->push("            Fields\Checkbox::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|boolean')");
            }

            if($item['default']){
                $field->push("              ->default(".$item['default'].")");
            }
        }
        elseif($item['type'] === 'date'){
            $field->push("            Fields\DateTime::make('".$item['name']."')->date()");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'time'){
            $field->push("            Fields\DateTime::make('".$item['name']."')->time()");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'datetime'){
            $field->push("            Fields\DateTime::make('".$item['name']."')->date()->time()");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'icon'){
            $field->push("            Fields\Text::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'password'){
            $field->push("            Fields\Password::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']  === 'required' ?? 'required'."string|confirmed|min:6|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'email'){
            $field->push("            Fields\Email::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|email|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'tel'){
            $field->push("            Fields\Tel::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|min:10|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'color'){
            $field->push("            Fields\Color::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }
        elseif($item['type'] === 'int'){
            $field->push("            Fields\Number::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default(".$item['default'].")");
            }
        }
        else {
            $field->push("            Fields\Text::make('".$item['name']."')");

            if($item['maxLength']){
                $field->push("              ->rules('".$item['required']."|string|max:".$item['maxLength']."')");
            }

            if($item['default']){
                $field->push("              ->default('".$item['default']."')");
            }
        }

        if($item['unique'] && !($item['required'] === 'required')){
            $field->push("              ->unique()");
        }

        if($item['required'] === 'required'){
            $field->push("              ->required()");
        }

        return $field->implode("\n") .",";
    }
}
