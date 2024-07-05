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
        Schema::create('product_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('short_des', 200);
            $table->string('image', 300); 
            //Foreign Key
            $table->unsignedBigInteger('product_id')->unique();

            //Relationship
         
            $table->foreign('product_id')->references('id')->on('products')
            ->casecadeOnUpdate()->restricOnDelete();
            
            $table->string('created_at')->useCurrent();
            $table->string('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sliders');
    }
};
