<?php namespace Reklamus\Push34\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class PlanController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'manage_plan'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Reklamus.Push34', 'main-menu-push34', 'side-menu-plan');
    }
}
