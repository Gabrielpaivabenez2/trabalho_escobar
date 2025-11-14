<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained('car_models')->cascadeOnDelete();
            $table->foreignId('color_id')->constrained('colors')->cascadeOnDelete();
            $table->integer('year');
            $table->integer('mileage');
            $table->decimal('price', 12, 2);
            $table->text('description')->nullable();
            $table->json('photos'); // array de URLs (mínimo 3)
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
