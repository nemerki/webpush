<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use Reklamus\Push34\Models\App;
use Illuminate\Support\Facades\Session;

class LayoutsComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Layouts',
            'description' => 'Layouts Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function onRun()
    {
        $user_id = Auth::getUser()->id;
        $this->page['activeApps'] = App::where('user_id', $user_id)->get();

        if (session()->has('app_id')) {
            $app_id = Session::get('app_id');
            $this->page['app_id'] = $app_id;


        } else {
            $user_id = Auth::getUser()->id;
            $apps = $this->page['apps'] = App::where('user_id', $user_id)->first();
            $app_id = $apps->id;
            $this->page['app_id'] = $app_id;
            Session::put('app_id', $app_id);
        }
    }

    public function onApp()
    {
        $app_id = post('app_id');
        Session::put('app_id', $app_id);
    }
}
