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
        Schema::create('products', function (Blueprint $table)
        {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('saller_id');
            $table->foreign('saller_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name',255)->index();

            $table->text('description');

            $table->double('price');

            $table->date('end_time');

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