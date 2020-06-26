<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('content')->nullable();
            $table->unsignedTinyInteger('status_id');
            $table->unsignedTinyInteger('type_id');
            $table->float('unit_price');
            $table->float('promotion_price');
            $table->string('image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->foreignId('products_list_id');
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
        Schema::dropIfExists('product');
    }
}
