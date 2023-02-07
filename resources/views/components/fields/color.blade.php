@if($field->required)
<x-tomato-color :name="$field->name" type="color"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required/>
@else
<x-tomato-color :name="$field->name" type="color"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" />
@endif
