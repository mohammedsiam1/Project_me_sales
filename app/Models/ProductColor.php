<?php

namespace App\Models;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'color_product';


   public function Color(){
    return $this->belongsTo(Color::class);
   }
   

}
