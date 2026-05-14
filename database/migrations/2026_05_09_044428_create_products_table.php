<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('name_ru')->nullable();
            $table->string('name_tm')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_tm')->nullable();
            $table->string('shop')->nullable();
            $table->integer('view_count')->unsigned()->default(0);
            $table->integer('like_count')->unsigned()->default(0);
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
