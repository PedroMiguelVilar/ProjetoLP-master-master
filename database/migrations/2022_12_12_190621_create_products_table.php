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
            $table->unsignedBigInteger('user_id');
            $table->string("name");
            $table->string("description");
            $table->string("category");
            $table->integer("quantity");
            $table->float("price");
            $table->string("product_url")->default("https://www.clootrack.com/hubfs/Clootrack_Feb2022/images/product-categories.jpg");
            $table->string("hide")->default('no');
            $table->string("hide_admin")->default('no');
            $table->timestamps();

            $table->foreign('user_id', 'user_id_fk')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
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
