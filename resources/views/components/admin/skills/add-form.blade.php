@props([
    'value' => null,
    'route' => '',
    'parameter' => null,
    'is_edit' => false,
    'types' => (object) [
        (object) [
            'id' => 1,
            'name' => 'Programming Language',
        ],
        (object) [
            'id' => 2,
            'name' => 'database',
        ],
        (object) [
            'id' => 3,
            'name' => 'cloude',
        ],
        (object) [
            'id' => 4,
            'name' => 'framework',
        ],
        (object) [
            'id' => 5,
            'name' => 'devops',
        ],
        (object) [
            'id' => 6,
            'name' => 'testing',
        ],
    ],
    'groups' => (object) [
        (object) [
            'id' => 1,
            'name' => 'frontend',
        ],
        (object) [
            'id' => 2,
            'name' => 'backend',
        ],
        (object) [
            'id' => 3,
            'name' => 'mobile',
        ],
    ],
])
<div class="pl-6 pr-3">
    <form method="POST" enctype="multipart/form-data" action="{{ route($route, $parameter) }}">
        @csrf
        <x-inputs.Input name="name" type="text" label="Skill Name" required="true" id='fullname' :oldvalue="$value?->name" />
        <x-inputs.Select :options="$types" name="type" type="text" label="Type" required="true"
            :oldvalue="$value?->type" />
        <x-inputs.Select :options="$groups" name="group" type="text" label="Group" required="true"
            :oldvalue="$value?->group" />
        <x-inputs.Input name="icon_tag" type="text" label="Icon Tag" required="false" :oldvalue="$value?->icon_tag" />
        <x-inputs.Input name="icon_svg" type="text" label="Icon Svg" required="false" :oldvalue="$value?->icon_svg" />
        <div class="flex justify-start">
            <x-buttons.SubmitButton class="mx-4" lable="submit" />
        </div>
    </form>
</div>
