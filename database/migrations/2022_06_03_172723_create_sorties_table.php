<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesTable extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dateHeureDebut');
            $table->string('duree');
            $table->string('dateLimiteInscription');
            $table->string('nbInscriptionMax');
            $table->text('infoSortie');
            $table->binary('photo')->nullable();
            $table->string('etat');
            $table->unsignedInteger('lieu_id');
            $table->foreign('lieu_id')->references('id')->on('lieus');
            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('Etat_id');
            $table->foreign('Etat_id')->references('id')->on('etats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sorties');
    }
}
