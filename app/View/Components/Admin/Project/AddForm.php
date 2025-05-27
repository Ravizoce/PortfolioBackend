<?php

namespace App\View\Components\Admin\Project;

use App\Models\Skill;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AddForm extends Component
{
    public $name;
    public Collection $skills;
    public Collection $types;
    public mixed $value;
    public string $route;
    public mixed $parameter;
    public string $is_edit;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $name = "ramesh",
        $value = null,
        string $route = '',
        mixed $parameter = '',
        string $is_edit = '0x00'
    ) {
        $this->name = $name;
        $this->skills = Skill::get();
        $this->types = new Collection([
            (object)['id' => 'Professional'],
            (object)['id' => 'Personal'],
        ]);

        $this->value = $value;
        $this->route = $route;
        $this->parameter = $parameter;
        $this->is_edit = $is_edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.project.add-form');
    }
}
