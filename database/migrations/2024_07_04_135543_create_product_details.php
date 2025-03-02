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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('img1', 200);
            $table->string('img2', 200);
            $table->string('img3', 200);
            $table->string('img4', 200);
            $table->longText('des');
            $table->string('color', 200);
            $table->string('size', 200); 
            
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
        Schema::dropIfExists('product_details');
    }
};
