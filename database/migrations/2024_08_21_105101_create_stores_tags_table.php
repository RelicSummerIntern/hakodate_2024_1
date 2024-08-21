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
        Schema::create('stores_tags', function (Blueprint $table) {
            $table->id(); // id
            $table->bigInteger('stores_id')->constrained('stores')->onDelete('cascade'); // stores_id (bigint)
            $table->bigInteger('tags_id')->constrained('tags')->onDelete('cascade'); // tags_id (bigint)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores_tags');
    }
};
