<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.create')}} {{ $translations['single'] }}</h1>

    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.'.$slug.'.store')}}" method="post">
        @include('tomato-ketchup::components.form', ['fields' => $fields])
        <x-splade-submit label="{{trans('tomato-admin::global.crud.create-new')}} {{ $translations['single'] }}" :spinner="true" />
    </x-splade-form>
</x-splade-modal>
