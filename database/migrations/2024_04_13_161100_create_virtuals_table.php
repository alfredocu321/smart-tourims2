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
        Schema::create('virtuals', function (Blueprint $table) {
            $table->id();
            $table->string('virtual_name');
            $table->string('url');
            $table->double('price');
            $table->text('short_Description');
            $table->text('long_Description');
            $table->string('image');
            $table->integer('view')->default(0);
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtuals');
    }
};
