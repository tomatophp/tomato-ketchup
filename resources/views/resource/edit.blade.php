<x-dynamic-component :component="($type === 'modal' || $type === 'slideover') ? 'splade-modal' : 'tomato-admin-layout'" class="font-main">
    @if(($type === 'modal' || $type === 'slideover'))
        <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.edit')}} {{ trans('tomato-roles::global.users.single') }} #{{$model->id}}</h1>
    @else
        <x-slot name="header">
            {{trans('tomato-admin::global.crud.edit')}} {{ trans('tomato-roles::global.users.single') }} #{{$model->id}}
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
        <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.'.$slug.'.update', $model->id)}}" method="post" :default="$model">

            @include('tomato-ketchup::components.form', ['fields' => $fields, 'edit' => true])
            <x-splade-submit label="{{trans('tomato-admin::global.crud.update')}} {{trans('tomato-roles::global.users.single')}}" :spinner="true" />
        </x-splade-form>
    @if($type === 'page' )
    </div>
   @endif
</x-dynamic-component>
