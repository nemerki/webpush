<?php namespace Reklamus\Profile;

use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UserController;
use RainLab\User\Models\User as UserModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {

    }

    public function boot()
    {

        UserModel::extend(function ($model) {

            $model->hasMany['apps'] = ['Reklamus\Push34\Models\App'];


        });


        UserController::extendFormFields(function ($form, $model, $context) {
            $form->addTabFields([
                'phone' => [
                    'label' => 'Phone',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
                'company_name' => [
                    'label' => 'Company Name',
                    'type' => 'text',
                    'tab' => 'Profile'
                ],
            ]);
        });
    }
}
