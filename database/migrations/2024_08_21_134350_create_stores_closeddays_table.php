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
        Schema::create('stores_closeddays', function (Blueprint $table) {
            $table->id(); // id
            $table->foreignId('stores_id')->constrained('stores')->onDelete('cascade'); // 外部キー制約
            $table->foreignId('closeddays_id')->constrained('closeddays')->onDelete('cascade'); // 外部キー制約

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores_closeddays');
    }
};
