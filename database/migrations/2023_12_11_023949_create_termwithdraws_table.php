<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermwithdrawsTable extends Migration
{
    public function up()
    {
        Schema::create('termwithdraws', function (Blueprint $table) {
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('withdrawmethod_id');

            $table->foreign('withdrawmethod_id')
                ->references('id')->on('withdrawmethods')
                ->onDelete('cascade');

            $table->foreign('term_id')
                ->references('id')->on('terms')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('termwithdraws');
    }
}
