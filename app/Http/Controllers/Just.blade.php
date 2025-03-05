@props([
    'columns' => null, // Allow null for dynamic generation
    'values' => [], // Data to display in the table
    'hidden_fields' => [], // Fields to hide
    'routes' => [
        // CRUD and custom routes for actions
        'add' => null,
        'edit' => null,
        'delete' => null,
        'view' => null,
        'status' => null,
    ],
    'render_form' => null,
    'custom_render' => [], // Custom rendering logic for specific fields
    'pagination' => true, // Show or hide pagination
    'column_order' => [], // Specify custom column order
    'action' => true,
    'render_view' => null,
])

@php
    // Dynamically infer columns if not provided
    $inferredColumns =
        $values && isset($values[0])
            ? collect($values[0]->getAttributes())
                ->keys()
                ->mapWithKeys(fn($attr) => [$attr => Str::headline($attr)])
                ->toArray()
            : [];

    // Merge user-provided columns with inferred columns
    $columns = $columns ? array_merge($inferredColumns, $columns) : $inferredColumns;

    // Apply custom column order if provided
    if ($column_order) {
        $orderedColumns = collect($column_order)
            ->mapWithKeys(fn($key) => [$key => $columns[$key] ?? null])
            ->filter() // Remove columns that are not found in inferred columns
            ->toArray();

        $remainingColumns = array_diff_key($columns, $orderedColumns);
        $columns = array_merge($remainingColumns, $orderedColumns); // Merge remaining columns with ordered ones
    }
@endphp

<div class="mt-3">
    @if (empty($values[0]))
        <h4 class="mt-2 text-muted text-center">No data found!</h4>
    @else
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>SN</th>
                        @foreach ($columns as $field => $title)
                            @unless (in_array($field, $hidden_fields))
                                <th scope="col">{{ $title }}</th>
                            @endunless
                        @endforeach
                        @if ($action)
                            <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($values as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($columns as $key => $title)
                                @unless (in_array($key, $hidden_fields))
                                    <td>
                                        {{-- Check for Custom Rendering --}}
                                        @if (isset($custom_render[$key]))
                                            {!! $custom_render[$key]($value->{$key}, $value) !!}
                                        @elseif (is_object($value->{$key}))
                                            {{-- For related models --}}
                                            {{ $value->{$key}->name ?? 'N/A' }}
                                        @else
                                            {{ is_string($value->{$key}) ? Str::limit(strip_tags($value->{$key}), 30, '...') : $value->{$key} }}
                                        @endif
                                    </td>
                                @endunless
                            @endforeach

                            {{-- Actions --}}
                            @if ($action)
                                <td>

                                    @if ($routes['view'])
                                        <button type="button" class="btn btn-small btn-primary" data-toggle="modal"
                                            data-target="#view{{ $value->id }}">
                                            <i class="fe fe-eye fe-16"></i>
                                        </button>
                                        <div class="modal fade" id="view{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalTitle">View</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $render_view($value) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($routes['update'])
                                        <x-admin.modal-add-form title="model" :id="$value->id">
                                            <x-slot:button>
                                                <button type="button" class="btn btn-secondary btn-small mb-0"
                                                    data-toggle="modal" data-target="#model-{{ $value->id }}">
                                                    <i class="fe fe-edit fe-16"></i>
                                                </button>
                                            </x-slot:button>
                                            {{ $render_form(route($routes['update'], $value->id), 'Update', $value) }}
                                        </x-admin.modal-add-form>
                                    @endif

                                    @if ($routes['delete'])
                                        <button type="button" class="btn btn-small btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $value->id }}">
                                            <i class="fe fe-trash-2 fe-16"></i>
                                        </button>
                                        <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
                                        </div>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
