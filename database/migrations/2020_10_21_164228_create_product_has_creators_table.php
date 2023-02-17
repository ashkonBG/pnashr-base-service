<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHasCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_creators', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('creator_id');
            $table->enum('role', ['writer', 'author', 'translator', 'teacher', 'speaker', 'cameraman']);

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('creator_id')
                ->references('id')
                ->on('creators')
                ->onDelete('cascade');

            $table->primary(['product_id', 'creator_id', 'role'], 'product_has_creators_product_id_creator_id_role_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_has_creators');
    }
}
