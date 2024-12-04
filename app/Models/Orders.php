<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $connection = 'mysql';//連線的資料庫
    protected $table = 'orders';//連線的資料表

    //設定可填的欄位(用create func會需要)
    // protected $fillable = [
    //     'name', 'phone'
    // ];

}
