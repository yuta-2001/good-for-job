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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message');
            $table->foreignId('company_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('occupation_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('employment_type_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('img');
            $table->foreignId('prefecture_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->string('address');
            $table->string('access');
            $table->string('payment');
            $table->string('content');
            $table->integer('status');
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
        Schema::dropIfExists('jobs');
    }
};
