<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BDDBDE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Activite', function (Blueprint $table) {
            $table->bigIncrements('ID_Activite');
            $table->char('Nom_Activite');
            $table->char('Description_Activite');
            $table->char('URL_Photo');
            $table->integer('Likes');
            $table->char('Commentaires');
            $table->date('Date_Activite');
            $table->integer('ID_Prix');
            $table->integer('ID_Recurrence');
            $table->foreign('ID_Prix')->references('ID_Prix')->on('Prix_Activite');
            $table->foreign('ID_Recurrence')->references('ID_Recurrence')->on('Recurrence');
        });
    
        Schema::create('Produit', function (Blueprint $table) {
            $table->bigIncrements('ID_Produit');
            $table->char('Nom_Produit');
            $table->char('Description_Produit');
            $table->float('Prix_Produit');
            $table->char('Catégorie_Produit');
            $table->integer('Quantité');
        });

        Schema::create('Participe', function (Blueprint $table) {
            $table->bigIncrements('ID_Inscrit');
            $table->integer('ID_Activite');
            $table->foreign('ID_Activite')->references('ID_Activite')->on('Activite');
        });

        Schema::create('Recurrence', function (Blueprint $table) {
            $table->bigIncrements('ID_Recurrence');
            $table->char('Recurrence_Activite');
        });

        Schema::create('Commentaire', function (Blueprint $table) {
            $table->bigIncrements('ID_Commentaire');
            $table->char('Contenu');
            $table->date('Date');
            $table->char('Utilisateur');
            $table->integer('ID_Activite');
            $table->foreign('ID_Activite')->references('ID_Activite')->on('Activite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Activite');
        Schema::drop('Produit');
        Schema::drop('Participe');
        Schema::drop('Recurrence');
        Schema::drop('Commentaire');
    }
}
