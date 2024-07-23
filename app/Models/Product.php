<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;
use App\Models\Img;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'desc',
        'newPrice',
        'oldPrice',
        'offerNotic',
        'user_id',
        'category_id'
    ];
    public $timestamps = true;
    protected $hidden=[
        'created_at','updated_at'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customers(){
        return $this->belongsToMany(Customer::class,'orders')->withPivot('totalPrice','quantity');
    }

    public function imgs(){
        return $this->hasMany(Img::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}