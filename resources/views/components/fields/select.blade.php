@if($field->required)
<x-splade-select :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required choices>
    @if(count($field->options))
        @foreach($field->options as $option)
            <option value="{{$option->value}}">{{$option->label}}</option>
        @endforeach
    @endif
</x-splade-select>
@else
<x-splade-select :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}"  choices>
    @if(count($field->options))
        @foreach($field->options as $option)
            <option value="{{$option->value}}">{{$option->label}}</option>
        @endforeach
    @endif
</x-splade-select>
@endif
