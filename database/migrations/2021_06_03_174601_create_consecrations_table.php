<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsecrationsTable extends Migration
{
    /**
     * Run the migrations.
     * Consagrações
     * @return void
     */
    public function up()
    {
        Schema::create('consecrations', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('Tipos Definido em função - Auxiliar, Diácono, Presbítero...');
            $table->date('date')->comment('Data da Consgração');
            $table->string('shepherd')->comment('Pastor responsável pela consagração');
            $table->integer('member_id');
            $table->integer('status')->nullable()->default(1)->comment('null/0 - cancelado, 1 - ativo, 2-Vencido ');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->comment('Resposável pelo cadastro');

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
        Schema::dropIfExists('consecrations');
    }
}
