<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('log_models', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('tbl_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->integer('user_id')->nullable(); // ใครเป็นคนทำ
            $table->string('action');               // ทำอะไร (เช่น Login, Create Order)
            $table->text('detail')->nullable();     // รายละเอียดเพิ่มเติม
            $table->string('ip_address')->nullable();
            $table->timestamps(); // เก็บ created_at อัตโนมัติ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_models');
    }
};
