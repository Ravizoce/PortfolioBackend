@props([
    'values' => null,
    'hidden_fields' => ['id', 'level', 'tag_line', 'tag_line2', 'deleted_at', 'updated_at'],
    'action' => true,
    'view_more' => false,
    'routes' => ['edit' => null, 'delete' => null, 'status' => null],
    'model' => ['view' => null],
])
@php
    $tableColums =
        $values && isset($values[0])
            ? collect($values[0]->getAttributes())
                ->keys()
                ->mapWithKeys(function ($keys) {
                    return [$keys => Str::of($keys)->replace('_', ' ')->title()];
                })
                ->toArray()
            : [];
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
                        <th>action</th>
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
                            @unless (in_array($key, $hidden_fields))
                                <td
                                    class="px-2 py-4 max-w-[2rem] lg:max-w-[10rem] whitespace-nowrap overflow-hidden text-ellipsis ">
                                    {{ $value->$key ?? '-' }}
                                    {{ $routes['edit'] }}
                                </td>
                            @endunless
                        @endforeach
                        @if ($view_more)
                            <th>$view_more</th>
                        @endif
                        @if ($action)
                            <td class="px-2 py-4 flex justify-center gap-3 item-center align-center">
                                <x-buttons.EditButton :itemId="$value->id" :editRoute="$routes['edit']">
                                    <span
                                        class="material-symbols-outlined text-green-500/95 transition-all duration-300 ease-in-out hover:scale-105 cursor-pointer">edit_square</span>
                                </x-buttons.EditButton>
                                <span
                                    class="material-symbols-outlined text-red-500/95 transition-all duration-300 ease-in-out hover:scale-105 cursor-pointer">delete</span>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <button type="button" class="button bg-blue-500 cursor-pointer hover:drop-shadow-lg shadow-lg rounded p-3 m-3"
        data-toggle="modal" data-target="#exampeModal2">
        Launch demo modal2
    </button>
</div>
