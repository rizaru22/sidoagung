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
        Schema::create('priodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_peternakan')->unsigned();
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->enum('aktif', ['on', 'of'])->default('on');
            $table->timestamps();
            $table->foreign('id_peternakan')->references('id')->on('peternakans')->onUpdate('cascade')->onDelete('cascade');

        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priodes');
    }
};
