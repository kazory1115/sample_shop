<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     * 分類表
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('類別名稱'); //unique()設定唯一值
            $table->text('description')->comment('類別描述');          
            $table->timestamps(); // created_at 和 updated_at

        });

        // 添加資料表備註
        DB::statement("ALTER TABLE `categories` comment '產品分類表'");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
