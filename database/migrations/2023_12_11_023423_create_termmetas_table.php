<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermmetasTable extends Migration
{
    public function up()
    {
        Schema::create('termmetas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('term_id');
            $table->string('key');
            $table->text('value')->nullable();
            //$table->timestamps();

            $table->foreign('term_id')
                ->references('id')->on('terms')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('termmetas');
    }
}
