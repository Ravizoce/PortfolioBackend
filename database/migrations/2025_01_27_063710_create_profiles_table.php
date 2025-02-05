<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("greating")->default("Hi, I`m")->comment("with gramer after greating eg: Hi, my name is ");
            $table->string("full_name")->default("Ramesh Prasad Joshi");
            $table->string("level")->default("full stack developer");
            $table->string("tag_line")->nullable();
            $table->string("tag_line2")->nullable();
            $table->text("About")->nullable();
            $table->string("image_url")->nullable();
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();
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
