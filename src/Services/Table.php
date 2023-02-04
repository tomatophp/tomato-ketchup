<?php

namespace Tomatophp\TomatoKetchup\Services;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class Table extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(
        protected string $model,
        protected array $fields
    )
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return $this->model::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(label: trans('tomato-admin::global.search'),columns: ['id','name',])
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: function ($model) {
                    $model = $this->model::find($model);
                    $model->delete();
                },
                after: fn () => Toast::danger(__('Permission Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->export()
            ->defaultSort('id')
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->paginate(15);

        foreach($this->fields as $field){
            $table->column(key: $field->name,label: $field->label?:$field->name);
        }
    }
}
