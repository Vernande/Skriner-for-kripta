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
        Schema::create('cost_notice', function (Blueprint $table) {
            $table->string("user_id");
            $table->string("coin_id");
            $table->integer("cost");
            $table->string("trigger");
            $table->string("notice_time")->nullable();

            $table->timestamps();

            $table->primary(["user_id", "coin_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost_notice');
    }
};
