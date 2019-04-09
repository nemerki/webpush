<?php namespace Reklamus\Push34;

use Reklamus\Push34\Models\Action;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'Reklamus',
            'description' => 'Seyfeler üçün olan componentler',
            'author' => 'Nemerki',
            'icon' => 'icon-wrench'
        ];
    }

    public function registerComponents()
    {

        return [
            'Reklamus\Push34\Components\RegisterComponent' => 'Register',
            'Reklamus\Push34\Components\ProfileComponent' => 'Profile',
            'Reklamus\Push34\Components\SendPushComponent' => 'SendPush',
            'Reklamus\Push34\Components\UpgradeComponent' => 'Upgrade',
            'Reklamus\Push34\Components\PaymentComponent' => 'Payment',
            'Reklamus\Push34\Components\PushComponent' => 'Push',
            'Reklamus\Push34\Components\NotificationComponent' => 'Notification',
            'Reklamus\Push34\Components\DesignComponent' => 'Design',
            'Reklamus\Push34\Components\DashbordComponent' => 'Dashbord',
            'Reklamus\Push34\Components\LayoutsComponent' => 'Layouts',
            'Reklamus\Push34\Components\WaitingNottificationComponent' => 'WaitingNottification',
            'Reklamus\Push34\Components\ReportComponent' => 'Report',
            'Reklamus\Push34\Components\AddNewAppComponent' => 'AddNewApp',
            'Reklamus\Push34\Components\AllNotificationComponent' => 'AllNotification',
            'Reklamus\Push34\Components\AcountExtendComponent' => 'AcountExtend',

        ];
    }

    public function registerFormWidgets()
    {
        return [

            'Reklamus\Push34\FormWidgets\SubscriberWidget' => [
                'label' => 'Subscribers Count',
                'code' => 'subscribers'
            ],
            'Reklamus\Push34\FormWidgets\IncludedWidget' => [
                'label' => 'Subscribers Count',
                'code' => 'includeds'
            ],


        ];
    }


    public function registerSettings()
    {
    }


    public function registerMarkupTags()
    {


        return [
            'functions' => [

                //config içindeki constantsı viewlarda kullanmak için ekledik bunu
                'config_get' => ['October\Rain\Support\Facades\Config', 'get'],

                'isAddApp' => function ($user_id, $app_count) {
                    $action = Action::where('user_id', $user_id)->where('status', 1)->first();
                    if ($action) {
                        if ($action->plan_id == 3 && $app_count <= 3) {
                            return true;
                        } elseif ($action->plan_id == 4) {
                            return true;
                        } else {
                            return false;
                        }

                    } else{
                        return false;
                    }

                }
            ]
        ];


    }
}
