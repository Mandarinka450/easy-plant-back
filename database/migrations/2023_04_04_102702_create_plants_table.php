<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name_rus');
            $table->string('name_eng');
            $table->text('image');
            $table->text('view');
            $table->string('short_temperature');
            $table->string('short_watering');
            $table->string('short_sun');
            $table->string('short_flowers');
            $table->string('short_fertilizer');
            $table->string('short_transfer');
            $table->enum('dangerous', ['Опасно', 'Не опасно']);
            $table->text('watering');
            $table->text('sun');
            $table->text('temperature');
            $table->text('fertilizer');
            $table->text('transfer');
            $table->text('diseases');
            $table->bigInteger('air');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
