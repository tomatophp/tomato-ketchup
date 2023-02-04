<x-splade-select :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}" choices>
    @if(count($field->options))
        @foreach($field->options as $option)
            <option value="{{$option->value}}">{{$option->label}}</option>
        @endforeach
    @endif
</x-splade-select>
