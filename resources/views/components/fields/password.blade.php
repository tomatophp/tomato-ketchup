@if($field->required && !$edit)
<x-splade-input  :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required/>
<x-splade-input  name="{{$field->name.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" required/>
@else
<x-splade-input  :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" />
<x-splade-input  name="{{$field->name.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" />
@endif
