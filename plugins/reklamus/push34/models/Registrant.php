<?php namespace Reklamus\Push34\Models;

use Model;

/**
 * Model
 */
class Registrant extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];
    protected $guarded = [];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'reklamus_push34_registrants';

    public $belongsTo = [
        'app' => ['Reklamus\Push34\Models\App'],
    ];
}
