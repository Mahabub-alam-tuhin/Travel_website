<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saveguides', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->integer('phone');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('linkdin');
            $table->text('Instagram');
            $table->text('youtube');
            $table->text('image');
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
        Schema::dropIfExists('saveguides');
    }
};
