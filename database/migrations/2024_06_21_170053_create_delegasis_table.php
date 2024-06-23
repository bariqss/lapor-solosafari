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
        Schema::create('delegasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_report');
            $table->string('status_delegasi');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegasis');
    }
};
