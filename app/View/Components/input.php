<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id,
        public ?string $list,
        public string $label,
        public ?string $type,
        public string $name,
        public ?string $value,
        public ?string $placeholder,
        public ?string $icon,
        public ?string $iconId,
    )
    {
        $this->type ??= "text";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
