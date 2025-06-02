<?php

namespace App\View\Components;

use App\Models\Materiels;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class materiel extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $image,
        public ?string $indice,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.materiel');
    }
}
