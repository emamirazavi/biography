<?php
// https://laravel.com/docs/5.0/schema
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bio extends Migration
{
    /**
     * جدول بیو وجود ندارد
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TABLE name: bio
        // id, name, job_title, avatar, location, about, email_subject, 
        // 1,  mhe , developer, 
        // 2,  sg, developer
        // 3,  mts, developer
        Schema::create('bio', function ($table) {
            $table->increments('id'); // 1, 2, 3, 4, 5
            $table->string('name', 100);
            $table->string('job_title');
            $table->string('avatar');
            $table->text('location');
            $table->text('about');
            $table->string('email_subject');
            $table->string('email_address');
            $table->string('smtp_user');
            $table->string('smtp_pass');
        });
    }

    /**
     * جدول بیو وجود دارد می‌خواهم برگردم!!!
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bio');
    }
}
