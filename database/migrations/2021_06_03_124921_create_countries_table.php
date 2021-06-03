<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('cod',3);
            $table->string('phone',4)->comment('Código do telefone do País');
            $table->string('iso',2)->comment('Sigla Iso');
            $table->string('iso3',3)->comment('Sigla Iso3');
            $table->string('name',150)->comment('Nome popular');
            $table->string('formal')->comment('Nome Formal');
            $table->float('latitude', 2, 7)->nullable()->comment('Linha central');
            $table->float('longitude', 2, 7)->nullable()->comment('Linha central');
            $table->integer('user_id')->default(1)->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes();
            //chaves
            $table->foreign('user_id')->references('id')->on('users');//Ligação com tabela users
            $table->foreign('user_updade')->references('id')->on('users');//Ligação com tabela users
            $table->foreign('user_deleted')->references('id')->on('users');//Ligação com tabela users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
