<x-tomato-admin-layout>
    <x-slot name="header">
        {{ $translations['index'] }}
    </x-slot>
    @if($create)
    <x-slot name="headerBody">
        <Link @if($create === 'modal') modal @elseif($create === 'slideover') slideover @endif href="{{route('admin.' .$slug. '.create')}}" class="filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
            {{trans('tomato-admin::global.crud.create-new')}} {{ $translations['single'] }}
        </Link>
    </x-slot>
    @endif


    <div class="pb-12" v-cloak>
        <div class="mx-auto">
            @if($model::count())
            <x-splade-table :for="$table" use="$slug, $fields" striped>
                <x-slot name="body">
                    <tbody>
                        @foreach($table->data->resource as $itemKey=>$item)
                            @php $itemPrimaryKey = $table->data->findPrimaryKey($item) @endphp
                            <tr
                                @if($table->data->rowLinks->has($itemKey))
                                    class="cursor-pointer"
                                @click="(event) => table.visit(@js($table->data->rowLinks->get($itemKey)), @js($table->data->rowLinkType), event)"
                                @endif
                                :class="{
                                    'bg-gray-50 dark:bg-gray-700 ': table.striped && @js($itemKey) % 2,
                                    'hover:bg-gray-100 dark:hover:bg-gray-600': table.striped,
                                    'hover:bg-gray-50 dark:hover:bg-gray-800 ': !table.striped
                                }">
                                @if($hasBulkActions = $table->data->hasBulkActions())
                                    <td width="64" class="text-xs px-6 py-4">
                                        <input
                                            @change="(e) => table.setSelectedItem(@js($itemPrimaryKey), e.target.checked)"
                                            :checked="table.itemIsSelected(@js($itemPrimaryKey))"
                                            :disabled="table.allItemsFromAllPagesAreSelected"
                                            class="rounded dark:bg-gray-500 border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 disabled:opacity-50"
                                            name="table-row-bulk-action"
                                            type="checkbox"
                                            value="{{ $itemPrimaryKey }}"
                                        />
                                    </td>
                                @endif
                                @foreach($fields as $field)
                                    <td class="whitespace-nowrap text-sm px-6 py-4 text-gray-500 dark:text-gray-200">
                                        @if($field->component === "x-splade-checkbox")
                                            @if($item->{$field->name})
                                                <x-heroicon-s-check-circle class="text-green-500 w-8 h-8"/>
                                            @else
                                                <x-heroicon-s-x-circle class="text-red-500 w-8 h-8"/>
                                            @endif
                                        @elseif($field->type === "tel")
                                            <a href="tel: {{  $item->{$field->name} }}">
                                                {{ $item->{$field->name} }}
                                            </a>
                                        @elseif($field->component === "x-splade-file")
                                            <a href="{{ $item->getMedia($field->name)->first()? $item->getMedia($field->name)->first()->getUrl(): '#' }}" target="_blank">
                                                @if($item->getMedia($field->name)->first())
                                                <div class="bg-cover bg-center w-16 h-16 rounded-full" style="
                                                    background-image: url('{{ $item->getMedia($field->name)->first()->getUrl()}}');
                                                    background-repeat: no-repeat">

                                                </div>
                                                @else
                                                    Not Set
                                                @endif
                                            </a>
                                        @elseif($field->type === "email")
                                            <a href="mailto: {{  $item->{$field->name} }}" target="_blank">
                                                {{ $item->{$field->name} }}
                                            </a>
                                        @elseif($field->component === "x-tomato-rich")
                                            {!! $item->{$field->name} !!}
                                        @else
                                            @if($item->{$field->name})
                                                {{  $item->{$field->name} }}
                                            @else
                                                Not Set
                                            @endif
                                        @endif
                                    </td>
                                @endforeach
                                <td class="whitespace-nowrap text-sm px-6 py-4 text-gray-500 dark:text-gray-200">
                                    <div class="flex justify-start">
                                        @if($show)
                                            <Link href="{{route('admin.' .$slug. '.show', $item->id)}}" class="px-2 text-blue-500" @if($show === 'modal') modal @elseif($show === 'slideover') slideover @endif>
                                            <div class="flex justify-start space-x-2">
                                                <x-heroicon-o-eye class="h-4 w-4"/>
                                                <span>{{trans('tomato-admin::global.crud.view')}}</span>
                                            </div>
                                            </Link>
                                        @endif
                                        @if($edit)
                                            <Link href="{{route('admin.' .$slug. '.edit', $item->id)}}" class="px-2 text-yellow-400" @if($edit === 'modal') modal @elseif($edit === 'slideover') slideover @endif>
                                            <div class="flex justify-start space-x-2">
                                                <x-heroicon-o-pencil class="h-4 w-4"/>
                                                <span>{{trans('tomato-admin::global.crud.edit')}}</span>
                                            </div>
                                            </Link>
                                        @endif
                                        @if($delete)
                                            <Link href="{{route('admin.' .$slug. '.destroy', $item->id)}}"
                                                  confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                                  confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                                  confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                                  cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                                  class="px-2 text-red-500"
                                                  method="delete"

                                            >
                                            <div class="flex justify-start space-x-2">
                                                <x-heroicon-o-trash class="h-4 w-4"/>
                                                <span>{{trans('tomato-admin::global.crud.delete')}}</span>
                                            </div>
                                            </Link>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-slot>
            </x-splade-table>
            @else
                <div class="relative text-center">
                    <div class="flex items-center justify-center">
                        <div
                            class="flex flex-col items-center justify-center flex-1 p-6 mx-auto space-y-6 text-center bg-white filament-tables-empty-state dark:bg-gray-800 rounded-lg shadow-sm">
                            <div
                                class="flex items-center justify-center w-16 h-16 rounded-full text-primary-500 bg-primary-50 dark:bg-gray-700">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>

                            <div class="max-w-md space-y-1">
                                <h2 class="text-xl font-bold tracking-tight filament-tables-empty-state-heading dark:text-white">
                                    {{ trans('tomato-admin::global.empty') }}
                                </h2>

                                <p
                                    class="text-sm font-medium text-gray-500 whitespace-normal filament-tables-empty-state-description dark:text-gray-400">

                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-tomato-admin-layout>
