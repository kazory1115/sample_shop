<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    use HasFactory;

    protected $connection = 'mysql';//連線的資料庫
    protected $table = 'order_items';//連線的資料表
    //設定可填的欄位(用create會需要)
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',   
    ];
    
}
