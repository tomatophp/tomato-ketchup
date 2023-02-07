<div class="flex flex-col space-y-4">
    @foreach($fields as $field)
        @if($field->name !== 'id')
            @if($field->reactive)
                <div v-if="form[@js($field->reactiveField)] === @js($field->reactiveWhere)">
                    @include('tomato-ketchup::components.form-body', ['field'=> $field, 'edit' => $edit])
                </div>
            @else
                @include('tomato-ketchup::components.form-body', ['field'=> $field, 'edit' => $edit])
            @endif
        @endif
    @endforeach
</div>
