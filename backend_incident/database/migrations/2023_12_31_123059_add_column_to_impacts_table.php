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
        Schema::table('impacts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('action_id')->nullable()->after('id');
            $table->foreign('action_id')
             ->references('id')->on('actions')
             ->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('impacts', function (Blueprint $table) {
            //
            $table->dropForeign(['action_id']);
            $table->dropColumn('action_id');
        });
    }
};
