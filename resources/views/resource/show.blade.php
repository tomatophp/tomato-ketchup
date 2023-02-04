<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ $translations['single'] }} #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">
        @foreach($fields as $field)
            @if($field->type == 'relation')
                @continue
            @endif
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold">
                        {{ $field->label ?: ucfirst(str_replace('_',' ',$field->name)) }}
                    </h3>
                </div>
                <div>
                    <h3 class="text-lg">
                        {{ $model->{$field->name} }}
                    </h3>
                </div>
            </div>

        @endforeach
    </div>
</x-splade-modal>
