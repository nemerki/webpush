<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;

class ProfileComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Profile',
            'description' => 'Profile Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSave()
    {
        $data = post();
        User::where('id',Auth::getUser()->id)->update($data);
    }
}
