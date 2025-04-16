@props([
    'value' => null,
    'route' => '',
    'parameter' => null,
    'is_edit' => false,
])
<div class="pl-6 pr-3">
    <form method="POST" action="{{ route($route, $parameter) }}">
        @csrf
        <x-inputs.Input name="designation" type="text" label="Designation" required="true" id='fullname' :oldvalue="$value?->designation" />
        <x-inputs.Input name="company" type="text" label="Company" required="true" :oldvalue="$value?->company" />
        <x-inputs.Input name="start_date" type="text" label="Start Date" required="false" :oldvalue="$value?->start_date" />
        <x-inputs.Input name="end_date" type="text" label="End Date" required="false" :oldvalue="$value?->end_date" />
        <x-inputs.Input name="achievement" type="text" label="Achievement" :oldvalue="$value?->achievement" />
        <x-inputs.Input name="description" type="text" label="Description" multiple="true" required="true" :oldvalue="$value?->description" />
        <x-inputs.Select name="stack_used"  type="text" label="Stack Used" required="true" :oldvalue="$value?->stack_used" />

        <div class="flex justify-start">
            <x-buttons.SubmitButton class="mx-4" lable="submit" />
        </div>
    </form>
</div>
