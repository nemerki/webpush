<?php namespace Reklamus\Push34\Models;

use Model;

/**
 * Model
 */
class Subscriber extends Model
{

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;
    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'count' => 'required',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'reklamus_push34_subscribers';
}
