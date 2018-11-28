<?php namespace Reklamus\Push34\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use Reklamus\Push34\Models\App;
use Reklamus\Push34\Models\Design;
use System\Models\File;
use Illuminate\Support\Facades\Input;

class RegisterComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Register',
            'description' => 'Register Page Component Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSave()
    {
        $data = Input::only('full_ssl', 'subdomain_name', 'site_url');
        $user_id = Auth::getUser()->id;
        $date = $date = strtotime(date("Y/m/d H:i:s") . substr((string)microtime(), 1, 6));
        $key = $date . $user_id;
        $app_key = "Al" . md5($key);
        $data['user_id'] = Auth::getUser()->id;
        $data['app_key'] = $app_key;

        $app = App::create($data);
        if ($app) {
            $design_data = [
                'delay_sec' => 10,
                'pop_title' => 'Takipte kalın',
                'pop_text' => $app->subdomain_name . ' ile sezonun trendini takip etmek için ücretsiz kaydol.',
                'window_text' =>'Ücretsiz takip etmek için bildirimlere izin vermeniz yeterli.',
                'allow_btn' => 'Hemen Kaydol',
                'dis_allow_btn' => 'Daha Sonra Sor',
                'pop_position' => '2',
                'app_id' => $app->id,
                'window_img'=>'/storage/app/uploads/public/noimg.png',
                'pop_img'=>'/storage/app/uploads/public/noimg.png',
            ];
            $design = Design::create($design_data);


        }
    }
}
