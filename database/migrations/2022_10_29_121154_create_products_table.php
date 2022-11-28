<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('brand')->nullable();
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->string('quantity');
            $table->boolean('trending')->comment('1 meaning trending, 0 meaning not-trending');
            $table->boolean('status')->comment('1 meaning visible, 0 meaning disable');
            $table->boolean('featuring')->comment('1 meaning visible, 0 meaning disable');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
