<?php

namespace TomatoPHP\TomatoKetchup\Resource\Pages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoKetchup\Resource\Actions;
use TomatoPHP\TomatoKetchup\Resource\Hooks;

/**
 * @property string $type
 * @property string|null $view
 * @property string $resource
 * @method Request beforeStore(Request $request)
 * @method Request beforeStoreAPI(Request $request)
 * @method void afterStore(Request $request, $record)
 * @method void afterStoreAPI(Request $request, $record)
 * @method void beforeShow(Request $request, $record)
 * @method void beforeShowQuery($query, Request $request, array $rows)
 *
 */
class CreatePage
{
    use Hooks\Store\Before;
    use Hooks\Store\BeforeAPI;
    use Hooks\Store\After;
    use Hooks\Store\AfterAPI;
    use Hooks\Show\Before;
    use Hooks\Show\BeforeQuery;

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
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view($this->view ?: app($this->resource)->views.'.create', [
            "model" => app($this->resource)->model,
            "fields" => collect(app($this->resource)->fields())->where('create', true),
            "translations" => app($this->resource)->translations(),
            "slug" => app($this->resource)->slug,
            "type" => $this->type
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        app($this->resource)->validateRequest($request);

        $request = $this->beforeStore($request);

        $record = app($this->resource)->model::create($request->all());

        app($this->resource)->processMedia($request, $record);

        $this->afterStore($request, $record);

        Toast::title(app($this->resource)->translations()['messages']['store'])->success()->autoDismiss(2);
        return redirect()->route('admin.' . app($this->resource)->slug . '.index');
    }
}
