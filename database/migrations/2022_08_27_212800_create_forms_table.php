<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('whatsApp');
            $table->string('email');
            $table->string('location');
            $table->string('raison_sociale');
            $table->string('activity');
            $table->string('situation_geo');
            $table->string('staff');
            $table->boolean('registre');
            $table->boolean('dfe');
            $table->string('regime');
            $table->boolean('logiciel');
            $table->boolean('cabinet');
            $table->boolean('is_required_finance');
            $table->string('montant_finance')->nullable();
            $table->string('balance_due');
            $table->string('preference');
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
        Schema::dropIfExists('forms');
    }
};