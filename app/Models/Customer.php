<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'email',
        'firstName',
        'lastName',
        'phone',
        'address',
        'city',
        'notics',
        'user_id',
        'invoId',
        'check',
        'vat',
        'delivery'
    ];

    public $timestamps = true;
    
    protected $hidden=[
        'created_at','updated_at'
    ];
     
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'orders')->withPivot('totalPrice','quantity','year','day','month');
    }
}
