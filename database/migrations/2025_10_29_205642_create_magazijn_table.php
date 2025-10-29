<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('magazijn', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('verpakkings_eenheid', 5, 2);
            $table->integer('aantal_aanwezig')->nullable();
            $table->bit('is_actief')->default(1);
            $table->string('opmerking', 250)->nullable();
            $table->dateTime('datum_aangemaakt', 6)->useCurrent();
            $table->dateTime('datum_gewijzigd', 6)->nullable();
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('magazijn');
    }
};
