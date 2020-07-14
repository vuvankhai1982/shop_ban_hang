<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->longText('content')->nullable();
            $table->unsignedTinyInteger('status_id');
            $table->unsignedTinyInteger('type_id');
            $table->unsignedBigInteger('unit_price');
            $table->unsignedBigInteger('promotion_price');
            $table->string('image')->nullable();
            $table->string('thumbnail_image')->nullable();


            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('restrict');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
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
}
