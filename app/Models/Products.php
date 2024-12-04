<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    // 允許批量賦值的欄位
    protected $fillable = [        
        'name',
        'description',
        'category_id',
        'image_url' ,
        'price' ,
    ];

}
