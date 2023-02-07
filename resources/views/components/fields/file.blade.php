@if($field->required)
<x-splade-file filepond preview :name="$field->name" type="file" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required/>
@else
<x-splade-file filepond preview :name="$field->name" type="file" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))"/>
@endif
