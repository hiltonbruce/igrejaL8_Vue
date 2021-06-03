<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     * Registros de disciplina, transferências, etc
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->integer('record_type_id');
            $table->text('description')->comment('Descrição do que ocorreu');
            $table->integer('member_id');
            $table->date('start')->comment('Inicio da ocorrência');
            $table->date('end')->nullable()->comment('Data final ou validade - null é por prazo indeterminado');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes();
            //chaves
            $table->foreign('user_id')->references('id')->on('users');//Ligação com tabela users
            $table->foreign('user_updade')->references('id')->on('users');//Ligação com tabela users
            $table->foreign('user_deleted')->references('id')->on('users');//Ligação com tabela users
            $table->foreign('member_id')->references('id')->on('members');//Ligação com tabela de membros
            $table->foreign('record_type_id')->references('id')->on('record_types');//Ligação com tabela de tipos de registros
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
