<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;
use Reklamus\Push34\Models\App;
use Reklamus\Push34\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class DesignComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Design',
            'description' => 'Design Page Component'
        ];
    }

    public function onRun()
    {
        $this->listDesign();
    }

    public function listDesign()
    {

        $app_id = Session::get('app_id');

        $apps = $this->page['apps'] = App::where('id', $app_id)->with('design')->first();
        $this->page['design'] = $apps->design;
    }

    public function defineProperties()
    {
        return [];
    }

    public function onNotifyDesignSave()
    {
        $data = Input::except('app_id', 'pop_img');
        $app_id = post('app_id');
        if (\request()->file('pop_img')) {
            $pop_img = Storage::disk("uploads")->putFile("/uploads/public/design", \request()->file('pop_img'));
            $data['pop_img'] = '/storage/app/' . $pop_img;
        }

        Design::where('app_id', $app_id)->update($data);
    }

    public function onWindowSave()
    {
        $data = Input::except('app_id', 'window_img');
        $app_id = post('app_id');
        if (\request()->file('window_img')) {
            $pop_img = Storage::disk("uploads")->putFile("/uploads/public/design", \request()->file('window_img'));
            $data['window_img'] = '/storage/app/' . $pop_img;
        }

        Design::where('app_id', $app_id)->update($data);
    }


}
