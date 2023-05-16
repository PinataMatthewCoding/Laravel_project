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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("zone");
            $table->string("price");

            $table->unsignedBigInteger("event_id");
            $table->foreign("event_id")->references("id")->on("events")->onDelete("cascade");
            $table->unsignedBigInteger("buy_ticket");
            $table->foreign("buy_ticket")->references("id")->on("users")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
