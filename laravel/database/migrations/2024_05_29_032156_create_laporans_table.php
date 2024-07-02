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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas_id');
            $table->integer('mdd_ci');
            $table->unsignedBigInteger('priode_id');
            $table->date('tgl_ci');
            $table->integer('pop_e');
            $table->integer('bw_doc');
            $table->text('doc');
            $table->text('jenis_pakan');
            $table->integer('tkp_sak');
            $table->integer('sp_sak');
            $table->integer('terpakai');
            $table->integer('umur');
            $table->integer('mor_e');
            $table->double('mor',8,2);
            $table->integer('ayam_hidup');
            $table->double('bw', 8, 3);
            $table->double('fi', 8, 3);
            $table->double('act_fcr', 8, 3);
            $table->double('std_fcr', 8, 3);
            $table->double('dif', 8, 3);
            $table->double('pbbh', 8, 3);
            $table->integer('std_pbbh');
            $table->integer('progres');
            $table->integer('ep');
            $table->integer('std_eph');
            $table->integer('progres2');
            $table->integer('suhu');
            $table->integer('rh');
            $table->integer('hi');
            $table->integer('kepadatan');
            $table->integer('tra');
            $table->integer('tma');
            $table->text('treatment_ovk');
            $table->text('kondisi');
            $table->text('saran');
            $table->timestamps();


            $table->foreign('petugas_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('priode_id')->references('id')->on('priodes')->onUpdate('cascade')->onDelete('cascade');
        });

}

        // Schema::create('laporans', function (Blueprint $table) {
        //     $table->foreign('priode_id')->references('id')->on('priodes')->onUpdate('cascade')->onDelete('cascade');
        // });


    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
