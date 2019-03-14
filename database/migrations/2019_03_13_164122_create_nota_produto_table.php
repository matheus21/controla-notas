<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_produto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nota_id')->nullable();
            $table->unsignedInteger('produto_id')->nullable();
            $table->unsignedBigInteger('quantidade')->nullable();

            $table->foreign('nota_id')->references('id')->on('nota')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->foreign('produto_id')->references('id')->on('produto')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nota_produto', function (Blueprint $table) {
            $table->dropForeign(['nota_id']);
            $table->dropForeign(['produto_id']);
        });

        Schema::dropIfExists('nota_produto');
    }
}
