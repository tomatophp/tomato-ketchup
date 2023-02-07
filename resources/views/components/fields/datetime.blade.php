@if($field->required)
<x-splade-input date time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required />
@else
<x-splade-input date time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}"  />
@endif
