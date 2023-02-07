
@if(isset($field->date) && isset($field->time) && $field->date && $field->time)
    @include('tomato-ketchup::components.fields.datetime', ['field'=> $field])
@elseif(isset($field->date) && $field->date)
        @include('tomato-ketchup::components.fields.date', ['field'=> $field])
@elseif(isset($field->time) && $field->time)
    @include('tomato-ketchup::components.fields.time', ['field'=> $field])
@elseif($field->component === 'x-splade-select')
    @include('tomato-ketchup::components.fields.select', ['field'=> $field])
@elseif($field->type === 'password')
    @include('tomato-ketchup::components.fields.password', ['field'=> $field, 'edit'=>$edit])
@elseif(
    $field->component === 'x-tomato-tel'
)
    @include('tomato-ketchup::components.fields.tel', ['field'=> $field])
@elseif(
$field->component === 'x-splade-checkbox'
)
    @include('tomato-ketchup::components.fields.checkbox', ['field'=> $field])
@elseif(
$field->component === 'x-splade-radio'
)
    @include('tomato-ketchup::components.fields.radio', ['field'=> $field])
@elseif(
    $field->component === 'x-tomato-rich'
)
    @include('tomato-ketchup::components.fields.rich', ['field'=> $field])
@elseif(
    $field->type === 'trans'
)
    @include('tomato-ketchup::components.fields.trans', ['field'=> $field])
@elseif(
$field->component === 'x-splade-textarea'
)
    @include('tomato-ketchup::components.fields.textarea', ['field'=> $field])
@elseif(
$field->component === 'x-tomato-repeater'
)
@elseif(
$field->component === 'x-tomato-color'
)
    @include('tomato-ketchup::components.fields.color', ['field'=> $field])
@elseif(
$field->component === 'x-splade-file'
)
    @include('tomato-ketchup::components.fields.file', ['field'=> $field])
@elseif(
    $field->type === 'text' ||
    $field->type === 'number' ||
    $field->type === 'email' ||
    $field->type === 'tel'
)
    @include('tomato-ketchup::components.fields.text', ['field'=> $field])
@endif
