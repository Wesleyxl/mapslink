<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->enum('label', ['service', 'compliment', 'complaint', 'other'])->default('other');
            $table->string('label_name')->nullable();
            $table->text('subject');
            $table->longText('message');
            $table->boolean('read')->default(0);
            $table->enum('status', ['inbox', 'send', 'sketch', 'trash'])->default('inbox');
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
        Schema::dropIfExists('emails');
    }
}
