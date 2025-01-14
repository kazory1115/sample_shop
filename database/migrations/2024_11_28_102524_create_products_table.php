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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('產品名稱');
            $table->text('description')->comment('產品介紹');
            $table->unsignedBigInteger('category_id')->nullable()->comment('類別編號');
            $table->Integer('show')->default(1)->comment('是否顯示(預設顯示1  不顯示 0)');
            $table->text('image_url')->comment('圖片網址');
            $table->decimal('price', 10, 2)->comment('價錢'); // 支持兩位小數
            $table->timestamps(); //created_at 和 updated_at
        
        });

        // 添加資料表備註
        DB::statement("ALTER TABLE `products` comment '產品列表'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
