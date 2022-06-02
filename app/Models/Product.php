<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sellers()
    {
        return $this->belongsToMany(Seller::class,'product_seller','product_id','seller_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
