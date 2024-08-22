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
        Schema::create('stores', function (Blueprint $table) {
            $table->id(); // id
            $table->string('storesname', 255); // 店名
            $table->string('address', 255); // 住所
            $table->string('phone_number', 255); // 電話番号
            $table->string('opentime', 255); // 開店時間
            $table->string('closetime', 255); // 閉店時間
            $table->string('homepage_url')->nullable(); // ホームページのURL, nullable
            $table->string('genre')->nullable(); // ジャンル, nullable
            $table->string('photo')->nullable(); // 景観, nullable
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps(); // created_at, updated_at (timestamp)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
