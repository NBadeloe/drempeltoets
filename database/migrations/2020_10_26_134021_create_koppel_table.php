<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoppelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koppel', function (Blueprint $table) {
            $table->id('koppel_id');
            $table->unsignedBigInteger('activiteiten_id')->constrained();
            $table->unsignedBigInteger('jongeren_id')->constrained();
            $table->foreign('activiteiten_id')->references('id')->on('activiteiten');
            $table->foreign('jongeren_id')->references('id')->on('jongeren');
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
        Schema::dropIfExists('koppel');
    }
}
