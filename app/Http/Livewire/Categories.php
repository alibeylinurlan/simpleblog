<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;

class Categories extends Component
{
    public function render()
    {
        $categories = Item::query()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            //->shuffle()
            ->toArray();

        return view('livewire.categories', compact('categories'));
    }
}
