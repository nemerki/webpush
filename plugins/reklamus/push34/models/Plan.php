<?php namespace Reklamus\Push34\Models;

use Model;

/**
 * Model
 */
class Plan extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Sluggable;
    protected $dates = ['deleted_at'];
    protected $slugs = ['slug' => 'name'];

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    protected $jsonable=['subscriber','included'];
    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['name', 'description'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',

    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'reklamus_push34_plans';

    public $belongsToMany = [
        'subscribers' => ['Reklamus\Push34\Models\Subscriber', 'table' => 'reklamus_push34_plan_subscribers', 'order' => 'sort_order'],
        'includeds' => ['Reklamus\Push34\Models\Included', 'table' => 'reklamus_push34_included_plans', 'order' => 'sort_order'],
    ];
    public $attachOne = [
        'icon' => 'System\Models\File'
    ];

}
