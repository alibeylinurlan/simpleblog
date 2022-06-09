<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function render()
    {
        return view('livewire.item');
    }
}
