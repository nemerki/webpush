<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;

class PushComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Push',
            'description' => 'Push Page Component'
        ];
    }


    public function onRun()
    {

    }


    public function defineProperties()
    {
        return [];
    }

    public function onSaveToken()
    {
        $token = post('sub_id');

        $registrant = new \Reklamus\Push34\Models\Registrant();
        $registrant->sub_id = $token;
        $registrant->save();
    }
}
