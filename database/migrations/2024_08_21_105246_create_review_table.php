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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->constrained('users')->onDelete('cascade'); // users_id (bigint)
            $table->bigInteger('stores_id')->constrained('stores')->onDelete('cascade'); // stores_id (bigint)
            $table->tinyInteger('rating');#評価
            $table->String('comment',500);#コメント 最大500文字
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
