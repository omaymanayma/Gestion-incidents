<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserRoles ; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('etb_id')->after('id');
            $table->foreign('etb_id')
             ->references('id_etab')->on('etablissements')
             ->onDelete('cascade')->onUpdate('cascade');
             $table->unsignedTinyInteger('role')->default(UserRoles::ADMIN)->after('etb_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
               //
               $table->dropForeign(['etb_id']);
               $table->dropColumn('etb_id');
               $table->dropColumn('role');
        });
    }
};
