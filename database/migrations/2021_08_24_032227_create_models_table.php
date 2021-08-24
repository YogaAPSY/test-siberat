<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('merek_id');
            $table->unsignedBigInteger('jenis_id');
            $table->timestamps();
        });

        Schema::table('modells', function ($table) {
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('merek_id')->references('id')->on('mereks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('jenis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models');
    }
}
