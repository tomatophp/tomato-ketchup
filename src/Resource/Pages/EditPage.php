<?php

namespace TomatoPHP\TomatoKetchup\Resource\Pages;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoKetchup\Resource\Hooks;


/**
 * @property string $type
 * @property string|null $view
 * @property string $resource
 * @method Request beforeUpdate(Request $request, $record)
 * @method Request beforeUpdateAPI(Request $request, $record)
 * @method void afterUpdate(Request $request, $record)
 * @method void afterUpdateAPI(Request $request, $record)
 */
class EditPage
{
    use Hooks\Update\Before;
    use Hooks\Update\BeforeAPI;
    use Hooks\Update\After;
    use Hooks\Update\AfterAPI;

    /**
     * @var string
     */
    public string $type = 'page';
    /**
     * @var string|null
     */
    public string|null $view = null;
    /**
     * @var string
     */
    public string $resource = "";


    /**
     * @param $model
     * @return View
     */
    public function edit($model): View
    {
        $model = app($this->resource)->model::find($model);

        app($this->resource)->loadMedia($model);

        return view($this->view ?: app($this->resource)->views.'.edit',[
            "model" => $model,
            "fields" =>collect(app($this->resource)->fields())->where('edit', true),
            "translations" => app($this->resource)->translations(),
            "slug" => app($this->resource)->slug,
            "type" => $this->type
        ]);
    }

    /**
     * @param Request $request
     * @param $model
     * @return RedirectResponse
     */
    public function update(Request $request, $model): RedirectResponse
    {
        $model = app($this->resource)->model::find($model);

        app($this->resource)->validateRequest($request, $model);

        $request = $this->beforeUpdate($request, $model);

        $model->update($request->all());

        app($this->resource)->processMedia($request, $model, true);

        $this->afterUpdate($request, $model);

        Toast::title(app($this->resource)->translations()['messages']['update'])->success()->autoDismiss(2);
        return back();
    }
}
