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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['pannes informatiques',' problèmes de laboratoire',' défaillances électriques','perturbations audiovisuelles','dommages ou perte de matériel','problèmes de logistique']);
            $table->text('description');
            $table->string('location');
            $table->string('etablissement')->default('noetab');
           //$table->foreign('etablissement')
           // ->references('id_etab')->on('etablissements')
           // ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
