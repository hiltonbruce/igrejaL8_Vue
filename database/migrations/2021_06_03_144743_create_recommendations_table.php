<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     * Cartas de recomendações, mudanças, etc
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('Tipo de carta - definir em função - Recomendação, mudança...');
            $table->integer('member_id');
            $table->integer('city_id')->nullable()->comment('Cidade de destino - Qdo null é intinerante');
            $table->string('destiny')->comment('Igreja/instituição de destino');
            $table->string('note')->comment('Observação qualquer');
            $table->date('emission')->comment('Data de emissão da carta');
            $table->date('validity')->comment('Data de vencimento');
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
            $table->foreign('city_id')->references('id')->on('cities');//Ligação com tabela de membros
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
}
