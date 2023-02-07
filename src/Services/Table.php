<?php

namespace TomatoPHP\TomatoKetchup\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Table\LaravelExcelException;

/**
 *
 */
class Table extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(
        protected string $model,
        protected Collection $fields,
        public SpladeTable|null $data=null,
        protected $deletable = true,
    )
    {
        //
    }


    /**
     * @param Request $request
     * @return bool
     */
    public function authorize(Request $request): bool
    {
        return true;
    }


    /**
     * @return array|mixed
     */
    public function for(): mixed
    {
        return $this->model::query();
    }


    /**
     * @param SpladeTable $table
     * @return void
     * @throws LaravelExcelException
     */
    public function configure(SpladeTable $table): void
    {
        $table
            ->withGlobalSearch(label: trans('tomato-admin::global.search'), columns: ['id','name',])
            ->export()
            ->defaultSort('id')
            ->paginate(15);

        if($this->deletable){
            $table->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: function ($model) {
                    $model = $this->model::find($model);
                    $model->delete();
                },
                after: fn () => Toast::danger(__('Permission Has Been Deleted'))->autoDismiss(2),
                confirm: true
            );
        }

        foreach($this->fields as $field){
            $table->column(key: $field->name,label: $field->label?:Str::title(Str::replace('_',' ', $field->name)));
        }

        $table->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'));

        $this->data= $table;
    }
}
