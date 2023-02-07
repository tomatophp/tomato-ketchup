@if($field->required)
<x-splade-radio :name="$field->name" type="radio"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required />
@else
<x-splade-radio :name="$field->name" type="radio"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))"  />
@endif
