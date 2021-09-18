<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('property_rights')->nullable();

            $table->text('social_links')->nullable();

            $table->longText('term_condition')->nullable();
            $table->longText('privacy')->nullable();
            $table->longText('about')->nullable();

            $table->string('site_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('description')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
