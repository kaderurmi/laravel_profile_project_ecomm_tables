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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName', 50);
            $table->string('lastName', 50);
            $table->string('mobile', 50);
            $table->string('city', 50);
            $table->string('shippingAddress', 1000);
            $table->string('email', 50)->unique();

            //Relationship
         
           $table->foreign('email')->references('email')->on('users')
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
        Schema::dropIfExists('profiles');
    }
};
