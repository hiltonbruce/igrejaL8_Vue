<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('marital_status')->nullable()->comment('Estado Civil - null/0-Solteiro, 1-Casado, 2-Divorciado - definir em função');
            $table->integer('city_birth')->nullable()->comment('Cidade natal');
            $table->boolean('sex')->nullable()->comment('0-Masculino, 1-Feminino');
            $table->integer('city')->comment('Cidade onde reside');
            $table->integer('district')->nullable()->comment('Bairro onde reside');
            $table->string('address')->comment('Residência - Logradouro');
            $table->integer('number_address')->nullable()->comment('Número da casa, prédio, construção, etc');
            $table->string('adjunct_address')->comment('Complemento - casa, apartamento, sítio,etc');
            $table->string('zip_code')->comment('Código de en dereçamento postal - CEP');
            $table->date('birth_date')->comment('Data de nascimento');
            $table->boolean('blood_donator')->comment('Doador de Sangue - 0-Não, 1-Sim');
            $table->string('blood', 4)->comment('Tipo samguíneo - A+, A-, etc');
            $table->string('mom')->comment('Nome da mãe');
            $table->integer('mom_id')->nullable()->comment('Rol da mãe se membro da igreja');
            $table->string('father')->comment('Nome do pai');
            $table->integer('father_id')->nullable()->comment('Rol do pai se membro da igreja');
            $table->integer('congregation')->comment('Congregação do membro');
            $table->year('baptism_Holy_Spirit')->nullable()->comment('Ano de batismo com Espirito Santo');
            $table->date('water_baptism')->nullable()->comment('Data do batismo em águas');
            $table->integer('city_baptism')->nullable()->comment('ID da Cidade onde onde foi batizado em águas');
            $table->date('work_assistant')->comment('Data da Consagração a auxiliar de trabalho');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
            $table->integer('user_update')->nullable()->comment('Resposável pelo cadastro');
            $table->integer('user_deleted')->nullable()->comment('Resposável pelo cadastro');

            $table->timestamps();
            $table->softDeletes();

            //chave
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
        Schema::dropIfExists('members');
    }
}
