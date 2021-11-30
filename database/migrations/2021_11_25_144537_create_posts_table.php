<?php

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->foreignId('categorie_id')->constrained('Categories');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('featured_image')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Posts', function(Blueprint $table){
            $table->dropConstrainedForeignId('categorie_id');

        });
        Schema::dropIfExists('posts');
    }
}
