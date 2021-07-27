<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('sq_mt');
            $table->string('main_photo');
            $table->string('photo_1');
            $table->string('photo_2');
            $table->string('photo_3');
            $table->string('photo_4');
            $table->string('photo_5');
            $table->integer('master_bedroom');
            $table->integer('bathroom');
            $table->boolean('kitchen')->default(1);
            $table->boolean('guest_toilet')->default(1);
            $table->boolean('corridor')->default(1);
            $table->boolean('store')->default(1);
            $table->boolean('balcony')->default(1);
            $table->boolean('elevator')->default(1);
            $table->boolean('cctv')->default(1);
            $table->boolean('garbage_shooter')->default(1);
            $table->boolean('parking')->default(1);
            $table->boolean('wifi')->default(1);
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
        Schema::dropIfExists('apartments');
    }
}
