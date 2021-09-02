<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsPortfolioAndSkill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function ($table) {
            $table->increments('id'); // 1, 2, 3, 4, 5
            $table->string('title', 100);
            $table->bigInteger('bio_id');
        });

        Schema::create('portfolios', function ($table) {
            // src, title, description
            $table->increments('id'); // 1, 2, 3, 4, 5
            $table->string('img', 300);
            $table->string('title', 200);
            $table->text('description');
            $table->bigInteger('bio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('portfolios');
    }
}
