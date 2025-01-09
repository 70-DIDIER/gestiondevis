<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('divers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nomclient');
            $table->string('nomdevis');
            $table->decimal('transport', 10, 2);
            $table->decimal('mainoeuvre', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('divers');
    }
};


