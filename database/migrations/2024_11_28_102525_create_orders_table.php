<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // 主键
            $table->unsignedBigInteger('user_id')->comment('用戶編號'); // 假设订单与用户有关系
            $table->decimal('total_price', 10, 2)->comment('總價');

            $table->string('status')->default('0')->comment('訂單狀態 0待處理 1已完成 預設待處理'); 
            $table->timestamps(); // created_at 和 updated_at
    
        });

        // 添加資料表備註
        DB::statement("ALTER TABLE `orders` comment '訂單表'");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

