<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $connection = 'mysql';//連線的資料庫
    protected $table = 'orders';//連線的資料表

    //設定可填的欄位(用create會需要)
    protected $fillable = [
        'user_id',
        'total_price',
        'status'
    ];

}
