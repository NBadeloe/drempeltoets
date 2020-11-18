<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJongerenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jongeren', function (Blueprint $table) {
            $table->id('id');
            $table->string('naam');
            $table->date('geboortedatum');
            $table->string('straat');
            $table->string('postcode');
            $table->string('woonplaats');
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
        Schema::dropIfExists('jongeren');
    }
}
