<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('content');
            $table->integer('status')->default(1);
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('cover_image')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('views')->unsigned()->nullable();
            $table->bigInteger('likes')->unsigned()->nullable();
            $table->bigInteger('dislikes')->unsigned()->nullable();
            $table->bigInteger('comments')->unsigned()->nullable();
            $table->bigInteger('shares')->unsigned()->nullable();
            $table->bigInteger('bookmarks')->unsigned()->nullable();
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('articles');
    }
};
