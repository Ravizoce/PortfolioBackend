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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->enum("type", ["pro_lan", "database", "cloude", "framework", "devops", "testing"]);
            $table->enum("group",["frontend","backend","mobile"])->nullable();
            $table->string("icon_tag")->nullable();
            $table->string("icon_svg")->nullable();
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
