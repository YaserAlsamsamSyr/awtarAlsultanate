<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'quantity',
        'totalPrice',
        'customer_id',
        'product_id',
        'year',
        'month',
        'day'
    ];
    public $timestamps = true;
    protected $hidden=[
        'created_at','updated_at'
    ];

}
