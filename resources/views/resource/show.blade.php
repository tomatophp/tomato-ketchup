<x-dynamic-component :component="($type === 'modal' || $type === 'slideover') ? 'splade-modal' : 'tomato-admin-layout'" class="font-main">
    @if(($type === 'modal' || $type === 'slideover'))
        <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} {{ $translations['single'] }} #{{$model->id}}</h1>
    @else
        <x-slot name="header">
            {{trans('tomato-admin::global.crud.view')}} {{ $translations['single'] }} #{{$model->id}}
        </x-slot>
        <x-slot name="headerBody">
            <Link href="{{ route('admin.'.$slug.'.index') }}" class="filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
            Back
            </Link>
        </x-slot>
    @endif


    @if($type === 'page' )
    <div class="p-4 my-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    @endif
        <div class="flex flex-col space-y-4">
    @foreach($fields as $field)
        @if($field->type == 'relation')
            @continue
        @endif
            @if($field->component === 'x-splade-checkbox')
                <div class="flex justify-between">
                    <div class="w-full">
                        <h3 class="text-lg font-bold">
                            {{ $field->label ?: ucfirst(str_replace('_',' ',$field->name)) }}
                        </h3>
                    </div>
                    <div class="w-full">
                        <h3 class="text-lg">
                            @if($model->{$field->name})
                                <x-heroicon-s-check-circle class="text-green-500 w-8 h-8"/>
                            @else
                                <x-heroicon-s-x-circle class="text-red-500 w-8 h-8"/>
                            @endif
                        </h3>
                    </div>
                </div>
            @elseif($field->component === 'x-tomato-rich')
                    <div class="flex justify-between">
                        <div class="w-full">
                            <h3 class="text-lg font-bold">
                                {{ $field->label ?: ucfirst(str_replace('_',' ',$field->name)) }}
                            </h3>
                        </div>
                        <div class="w-full">
                            @if($model->{$field->name})
                            <h3 class="text-lg">
                                {!! $model->{$field->name} !!}
                            </h3>
                            @else
                                Not Set
                            @endif
                        </div>
                    </div>
            @elseif($field->component === 'x-splade-file')
                <div class="flex justify-between">
                    <div class="w-full">
                        <h3 class="text-lg font-bold">
                            {{ $field->label ?: ucfirst(str_replace('_',' ',$field->name)) }}
                        </h3>
                    </div>
                    <div class="w-full">
                        @if($model->{$field->name})
                        <a href="{{ $model->{$field->name} }}" target="_blank">
                            <div class="bg-cover bg-center w-16 h-16 rounded-full" style="
                        background-image: url('{{ $model->{$field->name} }}');
                        background-repeat: no-repeat">

                            </div>
                        </a>
                        @else
                            Not Set
                        @endif
                    </div>
                </div>
            @else
                <div class="flex justify-between">
                    <div class="w-full">
                        <h3 class="text-lg font-bold">
                            {{ $field->label ?: ucfirst(str_replace('_',' ',$field->name)) }}
                        </h3>
                    </div>
                    <div class="w-full">
                        <h3 class="text-lg">
                            @if($model->{$field->name})
                                {{ $model->{$field->name} }}
                            @else
                                Not Set
                            @endif
                        </h3>
                    </div>
                </div>
            @endif
    @endforeach
</div>
    @if($type === 'page' )
    </div>
    @endif
</x-dynamic-component>
