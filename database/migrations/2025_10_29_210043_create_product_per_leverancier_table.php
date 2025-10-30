<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_per_leverancier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leverancier_id');
            $table->unsignedBigInteger('product_id');
            $table->date('datum_levering');
            $table->integer('aantal');
            $table->date('datum_eerstvolgende_levering')->nullable();
            $table->bit('is_actief')->default(1);
            $table->string('opmerking', 250)->nullable();
            $table->dateTime('datum_aangemaakt', 6)->useCurrent();
            $table->dateTime('datum_gewijzigd', 6)->nullable();
            $table->foreign('leverancier_id')->references('id')->on('leverancier');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_per_leverancier');
    }
};
