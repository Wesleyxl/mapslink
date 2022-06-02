<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('description');
            $table->foreignId('subcategory_id');
            $table->foreignId('category_id');
            $table->string('code');
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('cep');
            $table->string('uf');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('street');
            $table->string('number');
            $table->string('img')->nullable();
            $table->integer('stars')->default(0);
            $table->integer('views')->default(0);
            $table->string('url');
            $table->string('website')->nullable();
            $table->longText('map')->nullable();

            $table->string('sunday-is-open')->nullable();
            $table->string('sunday-from')->nullable();
            $table->string('sunday-to')->nullable();
            $table->string('sunday-lunch-from')->nullable();
            $table->string('sunday-lunch-to')->nullable();

            $table->string('monday-is-open')->nullable();
            $table->string('monday-from')->nullable();
            $table->string('monday-to')->nullable();
            $table->string('monday-lunch-from')->nullable();
            $table->string('monday-lunch-to')->nullable();

            $table->string('tuesday-is-open')->nullable();
            $table->string('tuesday-from')->nullable();
            $table->string('tuesday-to')->nullable();
            $table->string('tuesday-lunch-from')->nullable();
            $table->string('tuesday-lunch-to')->nullable();

            $table->string('wednesday-is-open')->nullable();
            $table->string('wednesday-from')->nullable();
            $table->string('wednesday-to')->nullable();
            $table->string('wednesday-lunch-from')->nullable();
            $table->string('wednesday-lunch-to')->nullable();

            $table->string('thursday-is-open')->nullable();
            $table->string('thursday-from')->nullable();
            $table->string('thursday-to')->nullable();
            $table->string('thursday-lunch-from')->nullable();
            $table->string('thursday-lunch-to')->nullable();

            $table->string('friday-is-open')->nullable();
            $table->string('friday-from')->nullable();
            $table->string('friday-to')->nullable();
            $table->string('friday-lunch-from')->nullable();
            $table->string('friday-lunch-to')->nullable();

            $table->string('saturnday-is-open')->nullable();
            $table->string('saturnday-from')->nullable();
            $table->string('saturnday-to')->nullable();
            $table->string('saturnday-lunch-from')->nullable();
            $table->string('saturnday-lunch-to')->nullable();

            $table->string('holiday-is-open')->nullable();
            $table->string('holiday-from')->nullable();
            $table->string('holiday-to')->nullable();
            $table->string('holiday-lunch-from')->nullable();
            $table->string('holiday-lunch-to')->nullable();

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('subcategories')
                ->onUpdate('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('companies');
    }
}
