<?php namespace Mel\Firstplugin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMelFirstpluginCategories extends Migration
{
    public function up()
    {
        Schema::create('mel_firstplugin_categories', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mel_firstplugin_categories');
    }
}
