<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordTypesTable extends Migration
{
    /**
     * Run the migrations.
     * O primeiro tipo de carta será considerada de mudança
     * Usar o classe Seeder para o preenchimeto inicial
     * @return void
     */
    public function up()
    {
        Schema::create('record_types', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->comment('Definição do tipo de registro');
            $table->string('description')->comment('descrição do tipo de registro');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes();
            //chaves
            // $table->foreign('user_id')->references('id')->on('users');//Ligação com tabela users
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
        Schema::dropIfExists('record_types');
    }
}
