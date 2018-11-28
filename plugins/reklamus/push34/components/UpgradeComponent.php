<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Session;

class UpgradeComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Upgrade',
            'description' => 'Upgrade Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSessionPurch()
    {
        $price = post('price');
        $value = post('value');
        $plan = post('plan');
        $period = post('period');
        Session::put('price', $price);
        Session::put('value', $value);
        Session::put('plan', $plan);
        Session::put('period', $period);
    }
}
