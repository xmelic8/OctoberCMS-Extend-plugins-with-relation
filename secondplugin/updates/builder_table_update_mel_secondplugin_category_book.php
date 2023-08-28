<?php namespace Mel\Secondplugin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMelSecondpluginCategoryBook extends Migration
{
    public function up()
    {
        Schema::table('mel_secondplugin_category_book', function($table)
        {
            $table->integer('sort_order')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('mel_secondplugin_category_book', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
