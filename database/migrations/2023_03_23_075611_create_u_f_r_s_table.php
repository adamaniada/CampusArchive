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
        Schema::create('u_f_r_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_univ');
            $table->string('nom');
            $table->string('designation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_f_r_s');
    }
};
