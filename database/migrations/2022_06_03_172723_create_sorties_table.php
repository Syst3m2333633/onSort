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
            $table->enum('etat', ['Ouverte', 'Clôturée', 'En cours', 'Passée', 'Annulée'])->default('Ouverte');
            $table->unsignedInteger('lieu_id');
            $table->foreign('lieu_id')->references('id')->on('lieus')->onDelete('cascade');
            // $table->unsignedInteger('campus_id');
            // $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->foreignIdFor(Campus::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('Etat_id');
            $table->foreign('Etat_id')->references('id')->on('etats')->onDelete('cascade');
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
        Schema::table('sorties', function(Blueprint $table) {
            $table->dropForeign(['lieu_id']);
            $table->dropForeign(['campus_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['Etat_id']);
        });
        Schema::dropIfExists('sorties');
    }
}
