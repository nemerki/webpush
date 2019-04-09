<?php namespace Novadg\Sdg\Models;

use Model;

/**
 * Model
 */
class CouncilTeam extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    
    public $translatable = ['full_name', 'position', 'state', 'short_info','desc'];
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'novadg_sdg_council_team';

    public $attachOne = [
        'image' => 'System\Models\File'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
