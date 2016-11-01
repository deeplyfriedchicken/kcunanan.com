<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lookups', function (Blueprint $table) {
        $table->increments('id');
        $table->string('category');
        $table->integer('user_id')->nullable();
        $table->integer('ref_id')->nullable();
        $table->string('portfolio_ish')->nullable(); // for homepage
        $table->string('blog_title')->nullable();
        $table->string('blog_cover_type')->nullable();
        $table->string('sub_category')->nullable();
        $table->string('blog_url')->nullable();
        $table->boolean('published')->nullable();
        $table->integer('blog_views')->nullable();
        $table->integer('blog_shares')->nullable();
        $table->string('media_url')->nullable();
        $table->string('portfolio_image')->nullable();
        $table->string('portfolio_link')->nullable();
        $table->string('github_url')->nullable();
        $table->string('helper_type')->nullable();
        $table->string('color')->nullable();
        $table->string('quote_author')->nullable();
        $table->string('heading')->nullable();
        $table->text('content')->nullable();
        $table->string('tag')->nullable();
        $table->date('date_posted')->nullable();
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
        Schema::drop('lookups');
    }
}
