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
        Schema::create('saveresorts', function (Blueprint $table) {
            $table->id();
            $table->string('division_id');
            $table->string('district_id');
            $table->string('upazila_id');
            $table->string('union_id');
            $table->string('guid_id');
            $table->text('name')->nullable();
            $table->string('day');
            $table->string('person');
            $table->integer('phone');
            $table->string('age');
            $table->text('description');
            $table->text('entry_fee');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('saveresorts');
    }
};
