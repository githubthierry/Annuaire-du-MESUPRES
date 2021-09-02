<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_personnels');
            $table->string('prenom_personnels');
            $table->string('email_personnels')->unique();
            $table->string('sexe_personnels');
            $table->string('adresse_personnels');
            $table->integer('contact_personnels');
            $table->date('ddn_personnels')->nullable();
            $table->integer('im_personnels');
            $table->string('diplome_personnels');
            $table->string('specialite_personnels');
            $table->string('grade_personnels');
            $table->string('profile_poste_personnels');
            $table->string('photo_personnels');
            $table->date('date_entre_admin_personnels')->nullable();
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('directions_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('services_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('divisions_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('postes_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
