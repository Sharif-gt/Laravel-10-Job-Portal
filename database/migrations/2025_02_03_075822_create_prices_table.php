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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('lable');
            $table->double('price');
            $table->integer('job_limit');
            $table->integer('feature_job_limit');
            $table->integer('highlight_job_limit');
            $table->boolean('profile_verified')->default(0);
            $table->boolean('recommended')->default(0);
            $table->boolean('frontend_show')->default(0);
            $table->boolean('home_show')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
