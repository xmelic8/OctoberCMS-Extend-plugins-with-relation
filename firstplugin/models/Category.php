<?php namespace Mel\Firstplugin\Models;

use Mel\Secondplugin\Models\Book;
use Model;
use October\Rain\Database\Traits\SortableRelation;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use SortableRelation;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'mel_firstplugin_categories';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'name' => ['required']
    ];

    /*public $belongsToMany = [
        'books' => [
            Book::class,
            'table'    => 'mel_secondplugin_category_book',
            'key'      => 'category_id',
            'otherKey' => 'book_id',
            'pivotSortable' => 'sort_order'
        ]
    ];*/
}
