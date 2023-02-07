<?php

namespace Tomatophp\TomatoKetchup\Resource;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Actions
{
    /**
     * @param Request $request
     * @param $model
     * @return void
     */
    public function validateRequest(Request $request, $model=null): void
    {
        $rules = [];
        foreach (collect($this->fields())->where($model ? 'edit' : 'create', true) as $field) {
            $getRules = [];
            if(is_array($field->rules)){
                if($field->required){
                    if($model) {
                        $getRules[] = "sometimes";
                    }
                    else {
                        $getRules[] = "required";
                    }
                }
                if(!$field->required){
                    $getRules[] = "nullable";
                }
                if($field->type === 'password'){
                    $getRules[] = "confirmed";
                    $getRules[] = "min:6";
                }
                if($field->unique){
                    $unique = "unique:".app($this->model)->getTable().','. $field->name;
                    if($model){
                        $unique .= ','. $model->id;
                    }
                    $getRules[] = $unique;
                }

                [...$getRules, ...$field->rules];
            }
            else {
                if($field->required){
                    if(!empty($field->rules)){
                        $field->rules .= "|";
                    }
                    if($model) {
                        $field->rules .= "sometimes";
                    }
                    else {
                        $field->rules .= "required";
                    }
                }
                if(!$field->required){
                    if(!empty($field->rules)){
                        $field->rules .= "|";
                    }
                    $field->rules .= "nullable";
                }
                if($field->unique){
                    if(!empty($field->rules)){
                        $field->rules .= "|";
                    }
                    if($model){
                        $field->rules .= "unique:".app($this->model)->getTable().','. $field->name.','. $model->id;
                    }
                    else {
                        $field->rules .= "unique:".app($this->model)->getTable().','. $field->name;
                    }

                }
                if($field->type === 'password'){
                    if(!empty($field->rules)){
                        $field->rules .= "|";
                    }
                    $field->rules .= "confirmed|min:6";
                }
            }
            if($model) {
                $rules[$field->name] = $field->editRules ?: $field->rules;
            }
            else {
                $rules[$field->name] = $field->createRules ?: $field->rules;
            }
        }

        $request->validate($rules);
    }

    /**
     * @param Request $request
     * @param $record
     * @param $edit
     * @return void
     */
    public function processMedia(Request $request, $record, $edit=false): void
    {
        foreach (collect($this->fields())->where($edit ? 'edit' : 'create', true) as $field){
            if($field->component === 'x-splade-file'){
                if($edit){
                    $record->clearMediaCollection($field->name);
                }
                if($field->multi){
                    if(count($request->{$field->name})){
                        foreach ($request->{$field->name} as $item) {
                            if($edit){
                                if(!is_string($item)){
                                    if($item->getClientOriginalName() === 'blob'){
                                        $record->addMedia($item)
                                            ->usingFileName(strtolower(Str::random(10).'_'.$field->name.'.'.$item->extension()))
                                            ->preservingOriginal()
                                            ->toMediaCollection($field->name);
                                    }
                                    else {
                                        $record->addMedia($item)
                                            ->preservingOriginal()
                                            ->toMediaCollection($field->name);
                                    }
                                }
                            }
                            else {
                                $record->addMedia($item)
                                    ->preservingOriginal()
                                    ->toMediaCollection($field->name);
                            }

                        }
                    }
                }
                else {
                    if($request->{$field->name}){
                        if($edit) {
                            if ($request->{$field->name}->getClientOriginalName() === 'blob') {
                                $record->addMedia($request->{$field->name})
                                    ->usingFileName(strtolower(Str::random(10) . '_' . $field->name . '.' . $request->{$field->name}->extension()))
                                    ->preservingOriginal()
                                    ->toMediaCollection($field->name);
                            } else {
                                $record->addMedia($request->{$field->name})
                                    ->preservingOriginal()
                                    ->toMediaCollection($field->name);
                            }
                        }
                        else {
                            $record->addMedia($request->{$field->name})
                                ->preservingOriginal()
                                ->toMediaCollection($field->name);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $model
     * @return void
     */
    public function loadMedia(&$model): void
    {
        foreach (collect($this->fields())->where('show', true) as $field){
            if($field->component === 'x-splade-file'){
                if($field->multi){
                    $model->{$field->name} = $model->getMedia($field->name)->map(function ($file) {
                        return $file->getUrl();
                    });
                }
                else {
                    $model->{$field->name} = $model->getMedia($field->name)->first() ? $model->getMedia($field->name)->first()->getUrl() : null;
                }
            }
        }
    }
}
