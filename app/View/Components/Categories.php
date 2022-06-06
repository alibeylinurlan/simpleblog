<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Item;

class Categories extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Item::query()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->shuffle()
            ->toArray();

        return view('components.categories', compact('categories'));
    }
}
