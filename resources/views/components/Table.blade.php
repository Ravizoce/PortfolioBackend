@props([
    'values' => null,
    'hidden_fields' => [],
    'fields_order' => [],
    'fileField' => ['image_url'],
    'customField'=>[],  //{{-- custom file formate ["key"=value] --}}
    'action' => true,
    'view_more' => true,
    'routes' => ['edit' => null, 'delete' => null, 'status' => null],
    'modal' => ['view' => null],
    'hide_in_viewmore' => ['id', 'deleted_at', 'updated_at'],
    'title' => 'Profile',
    'can' => ['edit' => true, 'delete' => true],
    'formcomponent' => 'NoComponentFound',
])
@php
    $columns = $values && isset($values[0]) ? collect($values[0]->getAttributes()) : null;
    if ($columns) {
        if(!empty($customField)){
            $customField = collect($customField);
            $columns = $customField->merge($columns);
        }
        if ($fields_order) {
            $Orderedcolumns = collect($fields_order)
                ->mapWithKeys(fn($key) => [$key => $columns[$key]])
                ->merge($columns->except($fields_order));
            $columns = $Orderedcolumns;
        }

        $tableColums =
            $columns != null
                ? $columns
                    ->keys()
                    ->mapWithKeys(function ($keys) {
                        return [$keys => Str::of($keys)->replace('_', ' ')->title()];
                    })
                    ->toArray()
                : [];
    }else{
        $tableColums =[];
    }
@endphp
<div class=" overflow-x-scroll md:overflow-x-auto">
    @if (empty($values[0]))
        <h4 class="mt-2 text-muted text-center">No data found!</h4>
    @else
        <table class="table-auto w-full text- mb-2">
            <thead class="text-sm p-3 text-gray-400 text-center bg-gray-950">
                <tr>
                    <th class="px-2 py-4">SN</th>
                    @foreach ($tableColums as $key => $tableColum)
                        @unless (in_array($key, $hidden_fields))
                            <th class="px-2 py-4">{{ $tableColum }}</th>
                        @endunless
                    @endforeach
                    @if ($view_more)
                        <th>View more</th>
                    @endif
                    @if ($action)
                        <th>action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($values as $value)
                
                    <tr class="{{ $loop->odd ? 'bg-gray-600' : 'bg-gray-700' }} ">
                        <td class="px-2 py-4">{{ $loop->iteration }}</td>
                        @foreach ($tableColums as $key => $tableColum)
                            @if (in_array($key, $fileField))
                                <td
                                    class="px-2 py-4 max-w-[2rem] lg:max-w-[10rem] whitespace-nowrap overflow-hidden text-ellipsis ">
                                    @if ($value->$key)
                                        <img class="h-[10vh] w-[20vw] object-contain rounded-md cursor-pointer"
                                            {{-- src="{{ asset('storage/' . $value->$key) }}" --}}
                                            src="{{ $value->urlImage }}"
                                            alt="{{ $value->$key ?? '-' }}">
                                    @else
                                        -
                                    @endif
                                </td>
                            @endif
                            @unless (in_array($key, $hidden_fields) || in_array($key, $fileField))
                                <td
                                    class="px-2 py-4 max-w-[2rem] lg:max-w-[10rem] whitespace-nowrap overflow-hidden text-ellipsis ">
                                    {{ $value->$key ?? '-' }}
                                </td>
                            @endunless
                        @endforeach
                        @if ($view_more)
                            <th>
                                <button data-toggle="modal" data-target="#viewmodal_{{ $value->id }}">
                                    <span
                                        class="material-symbols-outlined transition-all duration-300 ease-in-out hover:drop-shadow-[0px_0px_7px_rgb(225,225,225)] cursor-pointer">
                                        visibility
                                    </span>
                                </button>

                                <x-ViewModal :footer=false modal_title='{{ $title }} Details'
                                    class="!top-1/3 !-translate-y-1/3 !max-w-[50%]" id="viewmodal_{{ $value->id }}">
                                    <div class="flex flex-col justify-center align-middle w-fit">
                                        @php
                                            $looprNo = 0;
                                        @endphp
                                        @foreach ($tableColums as $viewkey => $viewItems)
                                            @unless (in_array($viewkey, $hide_in_viewmore))
                                                @php
                                                    ++$looprNo;
                                                @endphp
                                                <div
                                                    class="grid grid-cols-[1fr_4fr] bg-green-400 p-2 text-gray-300 {{ $loop->last ? 'rounded-b-lg p-1' : '' }} {{ $loop->first ? 'rounded-t-lg p-2' : '' }} {{ $looprNo % 2 == 0 ? 'bg-green-600/40' : 'bg-green-700/30' }}">
                                                    <div class="text-justify">
                                                        <label>{{ $viewItems }} :</label>
                                                    </div>
                                                    @if (in_array($viewkey, $fileField))
                                                        <div class="text-justify">
                                                            @if ($value->$viewkey)
                                                                <img class="h-[10vh] w-[20vw] object-contain rounded-md cursor-pointer "
                                                                    src="{{ asset('storage/' . $value->$viewkey) }}"
                                                                    alt="{{ $value->$key ?? '-' }}">
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div class="text-justify">
                                                            <span>{{ $value->$viewkey ?? '-' }}</span>
                                                        </div>
                                                    @endif

                                                </div>
                                            @endunless
                                        @endforeach
                                    </div>
                                </x-ViewModal>
                            </th>
                        @endif
                        @if ($action)
                            <th class="px-2 py-4">
                                @if ($can['edit'])
                                    <x-Modal :footer=false class="!top-1/3 !-translate-y-1/3 !w-[60%]"
                                        id="editmodal_{{ $value->id }}" modal_title="Edit {{ $title }}">
                                        <x-dynamic-component :component="$formcomponent" class="mt-4" :value="$value"
                                            :route="$routes['edit']" :parameter="$value->id" is_edit="0x01" />
                                    </x-Modal>
                                    <button data-toggle="modal" data-target="#editmodal_{{ $value->id }}"
                                        class="material-symbols-outlined rounded-md p-1 bg-green-500/95 transition-all duration-300 ease-in-out hover:shadow-[0px_0px_5px_rgba(255,255,255.0.1)] shadow-amber-400 cursor-pointer">edit_square</button>
                                @endif
                                @if ($can['delete'])
                                    <x-Modal :footer=true class="!top-1/3 !-translate-y-1/3 !w-fit"
                                        id="deletemodal_{{ $value->id }}" modal_title="Delete {{ $title }}">
                                        <div class="text-justify text-red-300 p-3 w-fit">
                                            This action cant be reversed ,This {{ $title }} with name
                                            "{{ $value?->full_name ?? $value?->name }}" will be deleted
                                            perminantly
                                        </div>
                                        <x-slot:footer_content>
                                            <div class="p-1">
                                                <form method="post"
                                                    action="{{ route($routes['delete'], $value->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                                        class="bg-red-500/30 px-4 py-1.5 mr-5 rounded-md font-bold cursor-pointer">
                                                        close
                                                    </button>
                                                    <button type="submit"
                                                        class="bg-red-500/80 px-4 py-1 mr-3 rounded-md font-bold cursor-pointer">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </x-slot:footer_content>
                                    </x-Modal>
                                    <button data-toggle="modal" data-target="#deletemodal_{{ $value->id }}"
                                        class="material-symbols-outlined bg-red-600 p-1 rounded-md text-white/95 transition-all duration-300 ease-in-out hover:shadow-[0px_0px_5px_rgba(255,255,255.0.1)] shadow-amber-400 cursor-pointer">delete</button>
                                @endIf
                            </th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5">
            {{ $values->links() }}
        </div>
    @endif

    {{-- <button type="button" class="button bg-blue-500 cursor-pointer hover:drop-shadow-lg shadow-lg rounded p-3 m-3"
        data-toggle="modal" data-target="#exampeModal2">
        Launch demo modal2
    </button> --}}
    @php
        gc_collect_cycles();
    @endphp
</div>
