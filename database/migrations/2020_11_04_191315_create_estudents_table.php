<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula',50)->unique();
            $table->string('id_num',50)->unique();
            $table->string('fisrt_name',50);
            $table->string('last_name',50);
            $table->string('home_phone',50)->nullable();
            $table->string('work_phone',50)->nullable();
            $table->string('cell_phone',50);
            $table->string('email',50)->unique();
            $table->string('address',255);
            $table->enum('type', ['Regular', 'Media']);
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
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
        Schema::dropIfExists('estudents');
    }
}
