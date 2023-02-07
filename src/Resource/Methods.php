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
use Tomatophp\TomatoKetchup\Resource\Hooks;

trait Methods
{
    /*
     * Load Hooks
     */
    use Hooks\Index\Before;
    use Hooks\Index\BeforeQuery;
    use Hooks\Index\BeforeQueryAPI;
    use Hooks\Index\AfterQuery;
    use Hooks\Index\AfterQueryAPI;
    use Hooks\Index\BeforeAPI;
    use Hooks\Index\After;
    use Hooks\Index\AfterAPI;
    use Hooks\Destroy\After;
    use Hooks\Destroy\Before;
    use Hooks\Bulk\Before;
    use Hooks\Bulk\After;
    use Hooks\Export\Before;
    use Hooks\Export\After;
    use Hooks\Import\Before;
    use Hooks\Import\After;

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $request = $this->beforeIndex($request);

        return view($this->views.'.index', [
            "table" => new Table($this->model, collect($this->fields())->where('list', true), null, $this->deletable),
            "fields" => collect($this->fields())->where('list', true),
            "model" => $this->model,
            "translations" => $this->translations(),
            "slug" => $this->slug,
            "create" => isset($this->pages()['create']) ? app($this->pages()['create'])->type : false,
            "edit" => isset($this->pages()['edit']) ? app($this->pages()['edit'])->type : false,
            "show" => isset( $this->pages()['show']) ? app($this->pages()['show'])->type :  false,
            "delete" => $this->deletable,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function json(Request $request): JsonResponse
    {
        $request = $this->beforeIndex($request);

        return response()->json([
            'model' => $this->model::all()->toArray(),
        ]);
    }


    /**
     * @return RedirectResponse | View
     */
    public function create(): RedirectResponse | View
    {
        if(isset($this->pages()['create'])){
            return app($this->pages()['create'])->create();
        }

        return back();
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if($this->pages()['create']){
            return app($this->pages()['create'])->store($request);
        }

        return back();
    }


    /**
     * @param Request $request
     * @param $model
     * @return RedirectResponse | View
     */
    public function show(Request $request, $model): RedirectResponse | View
    {
        if(isset($this->pages()['show'])){
            return app($this->pages()['show'])->show($request, $model);
        }

        return back();
    }

    /**
     * @param $model
     * @return RedirectResponse | View
     */
    public function edit($model): RedirectResponse | View
    {
        if(isset($this->pages()['edit'])){
            return app($this->pages()['edit'])->edit($model);
        }

        return back();
    }


    /**
     * @param Request $request
     * @param $model
     * @return RedirectResponse
     */
    public function update(Request $request, $model): RedirectResponse
    {
        if(isset($this->pages()['edit'])){
            return app($this->pages()['edit'])->update($request, $model);
        }

        return back();
    }


    /**
     * @param Request $request
     * @param $model
     * @return RedirectResponse
     */
    public  function destroy(Request $request, $model): RedirectResponse
    {
        $id = $model;
        $request = $this->beforeDestroy($request, $model);

        $model = $this->model::find($model);
        $model->delete();

        $this->afterDestroy($request, $id);

        Toast::title($this->translations()['messages']['destroy'])->success()->autoDismiss(2);
        return back();
    }
}
