<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Img extends Model
{
    use HasFactory;

    protected $fillable=['img','product_id'];

    protected $hidden=[
        'created_at','updated_at'
    ];
    public $timestamps = true;
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
