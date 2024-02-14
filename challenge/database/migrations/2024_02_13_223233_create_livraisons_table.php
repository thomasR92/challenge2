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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('quantite');
            $table->string('societe');
            $table->decimal('prix_HT', 10, 2);
            $table->decimal('prix_TTC', 10, 2);
            $table->decimal('prix_livraison', 10, 2);
            $table->string('type_vehicule');
            $table->string('immatriculation');
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraison');
    }
};
