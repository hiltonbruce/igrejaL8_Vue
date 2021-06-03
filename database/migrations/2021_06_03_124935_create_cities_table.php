<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->comment('Nome do município');
            $table->string('ibge', 7)->nullable()->comment('Antigo Código IBGE do município');
            $table->string('ibgenov', 7)->nullable()->comment('Novo Código IBGE do município');
            $table->float('latitude', 2, 7)->comment('Linha central do Município')->nullable();
            $table->float('longitude', 2, 7)->comment('Linha central do Município')->nullable();
            $table->boolean('capital')->comment('Verdadeiro para Capital do Estado')->nullable();
            $table->integer('state_id')->comment('Código UF do Estado - Chave de ligação');
            $table->string('idh', 50)->nullable()->comment('Classificação do município - IDH');
            $table->integer('population')->nullable()->comment('População do município');
            $table->boolean('status')->default('true')->comment('Status do Municípios');
            $table->integer('user_id')->default(1)->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
            //chaves
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('cities');
    }
}
