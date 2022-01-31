<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->string('genre');
            $table->year('year_published');
            $table->unsignedInteger('page_length');
            $table->unsignedInteger('rent_price');
            $table->unsignedInteger('buy_price');
            $table->unsignedInteger('rent_stock');
            $table->unsignedInteger('buy_stock');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');

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
        Schema::dropIfExists('book_details');
    }
}
