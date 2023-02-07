@if($field->required)
<x-splade-textarea  :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required />
@else
<x-splade-textarea  :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}"  />
@endif
