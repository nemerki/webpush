<?php namespace Reklamus\Push34\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class AppController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_app' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Reklamus.Push34', 'main-menu-push34', 'side-menu-app');
    }
}
