<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArthritisTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arthritis_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Bechterew');
            $table->string('description')->default('AS');
            $table->integer('user_count')->default(0);
            $table->integer('question_count')->default(0);
            $table->integer('news_count')->default(0);
            $table->integer('post_count')->default(0);
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
        Schema::dropIfExists('arthritis_types');
    }
}
