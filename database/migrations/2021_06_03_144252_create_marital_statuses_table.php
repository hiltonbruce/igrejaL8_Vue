<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     * Dados do matrimonio
     * @return void
     */
    public function up()
    {
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('spouse')->comment('Conjugue');
            $table->integer('spouse_id')->comment('Id do conjugue se for membro');
            $table->string('wedding_certificate')->comment('Certidão de casamento');
            $table->date('date')->comment('Data do casamento');
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
            $table->foreign('spouse_id')->references('id')->on('members');//Ligação com tabela de membros
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
}
