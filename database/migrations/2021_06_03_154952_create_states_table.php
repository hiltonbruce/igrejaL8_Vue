<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('initials',2)->comment('Sigla do Estado');
            $table->string('name',100)->comment('Nome do Estado');
            $table->string('initialsregion',2)->nullable()->comment('Sigla da Região do Estado');
            $table->string('region',20)->nullable()->comment('Região do Estado');
            $table->float('latitude', 2, 7)->comment('Linha central do Estado');
            $table->integer('country_id')->comment('Id do País a qeu pertence');
            $table->float('longitude', 2, 7)->comment('Linha central do Estado');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes();
            //chaves
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('states');
    }
}
