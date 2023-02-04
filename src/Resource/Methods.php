<?php

namespace Tomatophp\TomatoKetchup\Resource;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use Tomatophp\TomatoKetchup\Services\Table;

trait Methods
{

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('tomato-ketchup::resource.index', [
            "table" => new Table($this->model, $this->fields()),
            "model" => $this->model,
            "translations" => $this->translations(),
            "slug" => $this->slug,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function json(Request $request): JsonResponse
    {
        return response()->json([
            'model' => $this->model::all()->toArray(),
        ]);
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view('tomato-ketchup::resource.create', [
            "model" => $this->model,
            "fields" => $this->fields(),
            "translations" => $this->translations(),
            "slug" => $this->slug,
        ]);
    }


    public function store(Request $request)
    {
        $rules = [];
        $media = [];
        foreach ($this->fields() as $field) {
            if($field->type === 'media'){
                $media[] = [
                    "collection" => $field->name,
                    "multi" => $field->multi,
                ];
            }
            $rules[$field->name] = $field->rules;
        }
        $request->validate($rules);

        $record = $this->model::create($request->all());

        if(count($media)){
            foreach ($media as $mediaCollection){
                if($mediaCollection['multi']){
                    foreach ($request->{$mediaCollection['collection']} as $item) {
                        $record->addMedia($item)
                            ->preservingOriginal()
                            ->toMediaCollection($mediaCollection['collection']);
                    }
                }
                else {
                    $record->addMedia($request->{$mediaCollection['collection']})
                        ->preservingOriginal()
                        ->toMediaCollection($mediaCollection['collection']);
                }
            }
        }

        Toast::title($this->translations()['single'] . ' Has Been Created Successfully')->success()->autoDismiss(2);
        return redirect()->route('admin.'.$this->slug.'.index');
    }


    /**
     * @param $model
     * @return View
     */
    public function show($model): View
    {
        $model = $this->model::find($model);
        return view('tomato-ketchup::resource.show',[
            "model" => $model,
            "fields" => $this->fields(),
            "translations" => $this->translations(),
            "slug" => $this->slug,
        ]);
    }

    /**
     * @param $model
     * @return View
     */
    public function edit($model): View
    {
        $model = $this->model::find($model);
        return view('tomato-ketchup::resource.edit',[
            "model" => $model,
            "fields" => $this->fields(),
            "translations" => $this->translations(),
            "slug" => $this->slug,
        ]);
    }


    public function update(Request $request, $model)
    {
        $model = $this->model::find($model);

        $rules = [];
        $media = [];
        foreach ($this->fields() as $field) {
            if($field->type === 'media'){
                $media[] = [
                    "collection" => $field->name,
                    "multi" => $field->multi,
                ];
            }
            $rules[$field->name] = $field->rules;
        }
        $request->validate($rules);

        $record = $model->update($request->all());


        if(count($media)){
            foreach ($media as $mediaCollection){
                $model->clearMediaCollection($mediaCollection['collection']);
                if($mediaCollection['multi']){
                    foreach ($request->{$mediaCollection['collection']} as $item) {
                        if(!is_string($item)){
                            if($item->getClientOriginalName() === 'blob'){
                                $model->addMedia($item)
                                    ->usingFileName(strtolower(Str::random(10).'_'.$mediaCollection['collection'].'.'.$item->extension()))
                                    ->preservingOriginal()
                                    ->toMediaCollection($mediaCollection['collection']);
                            }
                            else {
                                $record->addMedia($item)
                                    ->preservingOriginal()
                                    ->toMediaCollection($mediaCollection['collection']);
                            }
                        }
                    }
                }
                else {
                    if($request->{$mediaCollection['collection']}->getClientOriginalName() === 'blob'){
                        $model->addMedia($request->{$mediaCollection['collection']})
                            ->usingFileName(strtolower(Str::random(10).'_'.$mediaCollection['collection'].'.'.$request->{$mediaCollection['collection']}->extension()))
                            ->preservingOriginal()
                            ->toMediaCollection($mediaCollection['collection']);
                    }
                    else {
                        $model->addMedia($request->{$mediaCollection['collection']})
                            ->preservingOriginal()
                            ->toMediaCollection($mediaCollection['collection']);
                    }
                }
            }
        }

        Toast::title($this->translations()['single'] . ' Has Been Updated Successfully')->success()->autoDismiss(2);
        return redirect()->route('admin.'.$this->slug.'.index');
    }


    public  function destroy($model): RedirectResponse
    {
        $model = $this->model::find($model);
        $model->delete();
        Toast::title($this->translations()['single'] . ' Has Been Deleted Successfully')->success()->autoDismiss(2);
        return redirect()->route('admin.'.$this->slug.'.index');
    }
}
