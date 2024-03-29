<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('votes')
                ->default(0);

            $table->string('slug')
                ->unique();
            $table->string('title');

            $table->text('body');

            $table->unsignedBigInteger('user_id');

            $table->unsignedInteger('answers')
                ->default(0);
            $table->unsignedInteger('best_answer_id')
                ->nullable();
            $table->unsignedInteger('views')
                ->default(0);

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
