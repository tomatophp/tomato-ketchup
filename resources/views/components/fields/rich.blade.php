@if($field->required)
<x-tomato-rich :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required />
@else
<x-tomato-rich :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))"  />
@endif
