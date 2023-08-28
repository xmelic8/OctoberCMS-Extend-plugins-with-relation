<?php namespace Mel\Secondplugin\Models;

use Mel\Firstplugin\Models\Category;
use Model;


/**
 * Model
 */
class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'mel_secondplugin_books';

    /**
     * @var array rules for validation.
     */
    public $rules = [
        'name' => ['required']
    ];

    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'mel_secondplugin_category_book',
            'key'      => 'book_id',
            'otherKey' => 'category_id'
        ]
    ];
}
