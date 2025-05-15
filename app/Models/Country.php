<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable=['enName','name','type','price_id'];
    
    public function price(){
        return $this->belongsTo(Price::class);
    }
}
