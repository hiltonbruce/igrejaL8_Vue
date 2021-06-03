<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     * Recibos de entgrega de cartão, carta, etc
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('Nome da tabela - Cartas ou cartão');
            $table->integer('receipt_id')->comment('ID na tabela correspondente definida em type');
            $table->integer('user_id')->comment('Resposável pelo cadastro');
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
        Schema::dropIfExists('delivery_receipts');
    }
}
