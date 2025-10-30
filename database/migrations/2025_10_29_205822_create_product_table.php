<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('barcode', 50);
            $table->bit('is_actief')->default(1);
            $table->string('opmerking', 250)->nullable();
            $table->dateTime('datum_aangemaakt', 6)->useCurrent();
            $table->dateTime('datum_gewijzigd', 6)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
