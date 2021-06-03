<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     * Histórico profissional
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('profession_id')->nullable()->comment('Código da profissão');

            $table->integer('member_id');
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
            $table->foreign('profession_id')->references('id')->on('professions');//Ligação com tabela de membros
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professionals');
    }
}
