<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiaireRefusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaire_refuses', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('matricule');
            $table->string('email');
            $table->integer('telephone');
            $table->string('photo');
            $table->string('specialite');
            $table->string('cv');
            $table->string('lettre_motiv');
            $table->integer('duree');
            $table->date('date_debut_stage');
            $table->string('site');
            $table->string('message');
            $table->string('traite');
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
        Schema::dropIfExists('stagiaire_refuses');
    }
}
