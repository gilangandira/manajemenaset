<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('assets');
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('image')->nullable();
            $table->string('nama_aset');
            $table->foreignId('status_id');
            $table->string('type');
            $table->text('description');
            $table->string('location');
            $table->string('serial_number');
            $table->decimal('price', 20, 2);
            $table->date('date_buyed');
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
        Schema::table('assets', function (Blueprint $table) {
            // $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            // $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }

};