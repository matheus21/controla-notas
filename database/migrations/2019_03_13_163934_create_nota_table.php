<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_emissao')->nullable();
            $table->unsignedInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('codigo')->nullable();
            $table->string('observacao')->nullable();
            $table->decimal('valor_total', 10, 2)->nullable();


            $table->foreign('cliente_id')->references('id')->on('cliente')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota', function (Blueprint $table) {
            $table->dropForeign(['cliente_id']);
        });

        Schema::dropIfExists('nota');
    }
}
