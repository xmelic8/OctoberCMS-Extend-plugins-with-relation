<?php namespace Mel\Secondplugin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMelSecondpluginCategoryBook extends Migration
{
    public function up()
    {
        Schema::create('mel_secondplugin_category_book', function($table)
        {
            $table->integer('category_id')->unsigned();
            $table->integer('book_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mel_secondplugin_category_book');
    }
}
