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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('訂單編號');
            $table->unsignedBigInteger('product_id')->comment('產品編號');
            $table->unsignedInteger('quantity')->default(1)->comment('數量');
            $table->decimal('price', 10, 2)->comment('單價');
            $table->decimal('total', 10, 2)->comment('總價');
            $table->timestamps(); // created_at 和 updated_at

            //onDelete('cascade')：確保跟 order_id 或 product_id 對應資料唯一性
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


        });

        // 添加資料表備註
        DB::statement("ALTER TABLE `order_items` comment '產品列表'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
