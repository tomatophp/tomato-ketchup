@if($field->required)
<x-splade-checkbox :name="$field->name" type="checkbox"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required/>
@else
<x-splade-checkbox :name="$field->name" type="checkbox"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))"/>
@endif
