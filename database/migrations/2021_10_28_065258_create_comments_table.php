<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('post_id'); 
            $table->text('body');
            $table->timestamps();

            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();


            // ამით ვაკავშირებთ სხვა ცხრილთან                      პოსტის წაშლის შემთხვევაში წაიშლება კომენატრიც
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            
            // $table->foreign('user_id')->references('id')->ong('users')->cascadeOnDelete();
        
        });
    }sadasd

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
