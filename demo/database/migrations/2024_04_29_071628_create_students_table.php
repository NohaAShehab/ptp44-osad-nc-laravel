<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    # to run migration
    # php artisan migrate
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            #  id , name, email, image, grade , gender
            $table->id(); #
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('image')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->integer('grade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    # php artisan migrate:rollback
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
