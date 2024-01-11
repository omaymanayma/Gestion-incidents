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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('incident_id')->nullable();
         $table->foreign('incident_id')
          ->references('id')->on('incidents')
          ->onDelete('cascade')->onUpdate('restrict');

            $table->text('description');
         $table->date('date_action')->nullable();
         

          $table->unsignedBigInteger('impact_id')->nullable();
         $table->foreign('impact_id')
          ->references('id')->on('impacts')
         ->onDelete('set null')->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
      
    }
};
