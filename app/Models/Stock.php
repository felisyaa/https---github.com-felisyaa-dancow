<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plant;
use App\Models\Item;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function plant() {
        return $this->belongsTo(Plant::class);
    }
    public function item() {
        return $this->belongsTo(Item::class);
    }
}
