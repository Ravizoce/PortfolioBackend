@props([
    'value' => null,
    'route' => '',
    'parameter' => null,
    'is_edit' => false,
])
<div class="pl-6 pr-3">
    <form method="POST" action="{{ route($route, $parameter) }}">
        @csrf
        <x-inputs.Input name="degree_name" type="text" label="Degree Name" required="true" id='fullname' :oldvalue="$value?->degree_name" />
        <x-inputs.Input name="board" type="text" label="Board" required="true" :oldvalue="$value?->board" />
        <x-inputs.Input name="college" type="text" label="College" required="true" :oldvalue="$value?->college" />
        <x-inputs.Input name="content" type="text" label="Content" multiple="true" required="true" :oldvalue="$value?->content" />
        <x-inputs.Input name="description" type="text" label="description" multiple="true" required="true" :oldvalue="$value?->content"/>
        <x-inputs.Input name="start_date" type="date" label="Start AD" required="false" :oldvalue="$value?->start_date" placeholder="2071"/>
        <x-inputs.Input name="end_date" type="date" label="End Date" required="false" :oldvalue="$value?->end_date" placeholder="2071"/>
        <x-inputs.Input name="gpa" type="text" label="GPA" required="false" :oldvalue="$value?->gpa"/>
        <x-inputs.Input name="final_project" type="text" label="Final Project" required="false" :oldvalue="$value?->final_project"/>

        <div class="flex justify-start">
            <x-buttons.SubmitButton class="mx-4" lable="submit" />
        </div>
    </form>
</div>
