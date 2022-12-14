<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImages(){
        return $this->hasMany(ImageProduct::class);
    }
    public function ColorProduct(){
        return $this->hasMany(ProductColor::class);
    }

    
    
}
