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
        Schema::create('posts', function (Blueprint $table) {
             $table->id();
             $table->integer('category_id');
             $table->string('name');
             $table->string('slug');
             $table->mediumtext('description');
             $table->string('yt_frame')->nullable();
             $table->string('meta_title')->nullable();
             $table->text('meta_description')->nullable();
             $table->text('meta_keyword')->nullable();
             $table->tinyInteger('status')->default('0');
             $table->Integer('created_by');
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
        Schema::dropIfExists('posts');
    }
};
