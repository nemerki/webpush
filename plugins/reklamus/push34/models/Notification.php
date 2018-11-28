<?php namespace Reklamus\Push34\Models;

use Model;

/**
 * Model
 */
class Notification extends Model
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
    public $table = 'reklamus_push34_notifications';

    public $attachOne = [
        'image' => 'System\Models\File',
    ];

    public $hasMany = [
        'send_tokens' => ['Reklamus\Push34\Models\SendToken', 'key' => 'notification_id', 'softDelete' => true],
    ];

}
