<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'first_foto',
    ];

    public function photos()
    {
        return $this->hasMany('App\Models\Photo', 'item_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'item_id', 'id');
    }

    public function texts()
    {
        return $this->hasMany('App\Models\Text', 'item_id', 'id');
    }

    public function otherlinks()
    {
        return $this->hasMany('App\Models\OtherLink', 'item_id', 'id');
    }

}
