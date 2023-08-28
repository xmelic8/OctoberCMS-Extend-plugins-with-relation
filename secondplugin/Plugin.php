<?php namespace Mel\Secondplugin;

use Mel\Firstplugin\Controllers\Categories;
use Mel\Firstplugin\Models\Category;
use Mel\Secondplugin\Models\Book;
use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //Extend model
        Category::extend(function ($model) {
            $model->belongsToMany['books'] = [
                Book::class,
                'table'    => 'mel_secondplugin_category_book',
                'key'      => 'category_id',
                'otherKey' => 'book_id',
                'pivotSortable' => 'sort_order'
            ];
        });

        //Extend controller
        Categories::extend(function ($controller) {
            $controller->relationConfig = $controller->mergeConfig(
                $controller->relationConfig,
                '$/mel/secondplugin/controllers/books/config_relation.yaml'
            );
        });

        //Extend form
        \Event::listen('backend.form.extendFields', function($widget) {
            if (!$widget->getController() instanceof Categories) {
                return;
            }

            if (!$widget->model instanceof Category) {
                return;
            }

            if ($widget->isNested) {
                //return;
            }

            $config = $widget->getController()->makeConfig('$/mel/secondplugin/models/category/fields.yaml');
            $widget->addFields($config->fields);
        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
