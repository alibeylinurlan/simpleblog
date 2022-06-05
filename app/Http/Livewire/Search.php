<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $name="";

    public function render()
    {   //CONCAT(oyun_adi,' ',vrs) like ? order by vrs desc limit 0,12
        $items = DB::select("select id, header from items where header like ? order by id desc limit 0,5", ["%".trim($this->name)."%"]);
        //dd($items);

        return view('livewire.search', compact('items'));
    }
}
