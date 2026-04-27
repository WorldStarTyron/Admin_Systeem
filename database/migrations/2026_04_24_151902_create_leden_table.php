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
        Schema::disableForeignKeyConstraints();

        Schema::create('leden', function (Blueprint $table) {
            $table->char('lid_id', 36)->primary();
            $table->char('gebruiker_id', 36);
            $table->foreign('gebruiker_id')->references('gebruiker_id')->on('gebruikers');
            $table->string('telefoonnummer', 20)->nullable();
            $table->string('adres', 255)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('woonplaats', 100)->nullable();
            $table->date('geboortedatum')->nullable();
            $table->enum('betaalstatus', ["actief","achterstallig","vrijgesteld"]);
            $table->timestamp('aangemaakt_op')->useCurrent();
            $table->timestamp('bijgewerkt_op')->useCurrent();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leden');
    }
};
