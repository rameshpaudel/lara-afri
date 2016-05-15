<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_type');
            $table->string('company_name');
            $table->string('city');
            $table->string('country');
            $table->string('address');
            $table->date('established_on');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_profiles');
    }
}
