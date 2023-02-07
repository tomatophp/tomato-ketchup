<?php

namespace Tomatophp\TomatoKetchup\Resource\Pages;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Tomatophp\TomatoKetchup\Resource\Hooks;

class ShowPage
{
    use Hooks\Show\After;
    use Hooks\Show\AfterAPI;
    use Hooks\Show\AfterQuery;
    use Hooks\Show\AfterQueryAPI;
    use Hooks\Show\Before;
    use Hooks\Show\BeforeAPI;
    use Hooks\Show\BeforeQuery;
    use Hooks\Show\BeforeQueryAPI;


    public string $type = 'modal';
    public string|null $view = null;
    public string $resource = "";

    /**
     * @param Request $request
     * @param $model
     * @return View
     */
    public function show(Request $request, $model): View
    {
        $model = $this->beforeShow($request, $model);

        $model = app($this->resource)->model::find($model);

        app($this->resource)->loadMedia($model);

        $this->afterShow($request, $model);

        return view($this->view ?: app($this->resource)->views.'.show',[
            "model" => $model,
            "fields" => collect(app($this->resource)->fields())->where('show', true),
            "translations" => app($this->resource)->translations(),
            "slug" => app($this->resource)->slug,
            "type" => $this->type
        ]);
    }
}
