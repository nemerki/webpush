<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use RainLab\User\Components\Account as UserAccount;
use Reklamus\Push34\Models\App;
use Reklamus\Push34\Models\Design;
use Validator;
use ValidationException;
use Illuminate\Support\Facades\Input;

class AcountExtendComponent extends UserAccount
{
    public function componentDetails()
    {
        return [
            'name' => 'AcountExtend',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRegister()
    {


        //Do anything you need to do

        $validateData = post();
        $rules = [
            'email'    => 'required|email|between:6,255',
            'password' => 'required|between:4,255|confirmed',
            'site_url' => 'required',
            'subdomain_name' => 'required|unique:reklamus_push34_apps'
        ];


        $validation = Validator::make($validateData, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);

        } else {


            $redirect = parent::onRegister();

            $user = $this->user(); // This is the user that was just created, here for example, dont need to assign it really
            // Now you can do stuff with any of the variables that were generated (such as user above)

            $data = Input::only('full_ssl', 'subdomain_name', 'site_url');
            $user_id = $user->id;
            $date = $date = strtotime(date("Y/m/d H:i:s") . substr((string)microtime(), 1, 6));
            $key = $date . $user_id;
            $app_key = "Al" . md5($key);
            $data['user_id'] =$user->id;
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


            // Return the redirect so we redirect like normal
            return $redirect;
        }
    }
}
