<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    
    protected $fillable=['vat','delivery'];
    
    public function countries(){
        return $this->hasMany(Country::class);
    }

}
