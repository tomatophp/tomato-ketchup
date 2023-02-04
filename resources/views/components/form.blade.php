<div class="flex flex-col space-y-4">
    @foreach($fields as $field)
        @if($field->name !== 'id')
            @if($field->reactive)
                <div v-if="form[@js($field->reactiveField)] === @js($field->reactiveWhere)">
                    @if($field->type === 'date')
                        <x-splade-input date :name="$field->name" :type="$field->type" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                    @elseif($field->type === 'datetime')
                        <x-splade-input date time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                    @elseif($field->type === 'time')
                        <x-splade-input  time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                    @elseif($field->type === 'select')
                        <x-splade-select :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}">
                            @if($field->has_options)
                                @foreach($field->options as $option)
                                    <option value="{{$option->name}}">{{$option->label}}</option>
                                @endforeach
                            @endif
                        </x-splade-select>
                    @elseif($field->type === 'password')
                        <x-splade-input  :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                        <x-splade-input  name="{{$field->name.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" required="{{$field->required}}"/>
                    @elseif($field->type === 'textarea')
                        <x-splade-textarea  :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                    @elseif(
                        $field->type === 'text' ||
                        $field->type === 'number' ||
                        $field->type === 'email' ||
                        $field->type === 'tel'
                    )
                        <x-splade-input :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required="{{$field->required}}"/>
                    @endif
                </div>
            @else
                @if($field->type === 'date')
                    <x-splade-input date :name="$field->name" :type="$field->type" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                @elseif($field->type === 'datetime')
                    <x-splade-input date time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                @elseif($field->type === 'time')
                    <x-splade-input time :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                @elseif($field->type === 'select')
                    <x-splade-select :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}">
                        @if($field->has_options)
                            @foreach($field->options as $option)
                                <option value="{{$option->name}}">{{$option->label}}</option>
                            @endforeach
                        @endif
                    </x-splade-select>
                @elseif($field->type === 'password')
                    <x-splade-input :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                    <x-splade-input name="{{$field->name.'_confirmation'}}" :type="$field->type"   placeholder="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name)) . ' Confirmation'}}" required="{{$field->required}}"/>
                @elseif($field->type === 'textarea')
                    <x-splade-textarea :name="$field->name" :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" label="{{$field->label ?: ucfirst(str_replace('_',' ',$field->name))}}" required="{{$field->required}}"/>
                @elseif(
                    $field->type === 'text' ||
                    $field->type === 'number' ||
                    $field->type === 'email' ||
                    $field->type === 'tel'
                )
                    <x-splade-input :name="$field->name" :type="$field->type"   :placeholder="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" :label="$field->label ?: ucfirst(str_replace('_',' ',$field->name))" required="{{$field->required}}"/>
                @endif
            @endif
        @endif
    @endforeach
</div>
