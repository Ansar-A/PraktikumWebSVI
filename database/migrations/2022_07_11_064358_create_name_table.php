<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20);
            $table->string('nama', 50);
            $table->date('ttglahir');
            $table->string('agama', 50);
            $table->string('jkelamin', 50);
            $table->text('desk_singkat')->nullable();
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
        Schema::dropIfExists('name');
    }
}
