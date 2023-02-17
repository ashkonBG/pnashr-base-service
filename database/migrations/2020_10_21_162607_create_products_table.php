<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->unsignedBigInteger('admin_id');
            $table->enum('type', ['video', 'book', 'podcast', 'e-book']);
            $table->string('title');
            $table->unsignedInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->text('description')->nullable();
            $table->string('ISBN')->nullable();
            $table->string('printing_number')->nullable();
            $table->string('edition_number', 10)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->boolean('packageable')->default(false);
            $table->timestamp('archived_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('discount')->default(0);
            $table->enum('discount_type', ['percentage', 'amount'])->default('amount');
            $table->unsignedBigInteger('publisher_share')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers')
                ->onDelete('cascade');
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
