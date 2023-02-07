@if($field->required)
<x-splade-input :name="$field->name.'.ar'" type="text"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.ar') .']'" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.ar') .']'" required/>
<x-splade-input :name="$field->name.'.en'" type="text"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.en') .']'" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.en') .']'" required/>
@else
    <x-splade-input :name="$field->name.'.ar'" type="text"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.ar') .']'" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.ar') .']'"/>
    <x-splade-input :name="$field->name.'.en'" type="text"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.en') .']'" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' [' . trans('tomato-ketchup::messages.lang.en') .']'"/>
@endif
