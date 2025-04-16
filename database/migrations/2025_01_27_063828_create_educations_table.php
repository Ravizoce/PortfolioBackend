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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string("degree_name");
            $table->string("board");
            $table->string("college");
            $table->string("start_date")->nullable();
            $table->string("end_date")->nullable();
            $table->string("gpa")->nullable();
            $table->string("final_project")->nullable();
            $table->json("content");
            $table->string("description");
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
