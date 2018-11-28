<?php namespace Reklamus\Push34\Models;

use Model;

/**
 * Model
 */
class App extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    protected $guarded = [];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'reklamus_push34_apps';

    public $hasOne = [
        'design' => ['Reklamus\Push34\Models\Design'],
    ];
    public $hasMany = [
        'registrants' => ['Reklamus\Push34\Models\Registrant', 'softDelete' => true],
    ];
}
