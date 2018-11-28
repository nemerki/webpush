<?php namespace Reklamus\Push34\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use Reklamus\Push34\Models\App;
use Reklamus\Push34\Models\Notification;
use Reklamus\Push34\Models\Registrant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashbordComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Dashbord',
            'description' => 'Dashbord Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->listRecentNotification();

        $app_id = Session::get('app_id');
        $browser_type = $this->page['browser_type'] = Registrant::where('app_id', $app_id)
            ->where('is_active', 1)
            ->select('browser_type', DB::raw('count(*) as total'))
            ->groupBy('browser_type')
            ->pluck('total', 'browser_type')->all();
        $device = $this->page['device'] = Registrant::where('app_id', $app_id)
            ->where('is_active', 1)
            ->select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->pluck('total', 'device')->all();
        $reqistrantsall = $this->page['reqistrantsall'] = Registrant::where('app_id', $app_id)
            ->count();
        $reqistrants = $this->page['reqistrants'] = Registrant::where('app_id', $app_id)
            ->where('is_active', 1)->count();
        $reqistrantsToday = $this->page['reqistrantsToday'] = Registrant::where('app_id', $app_id)
            ->where('is_active', 1)
            ->whereDate('created_at', '>', Carbon::today())
            ->count();


    }

    public function listRecentNotification()
    {
        $app_id = Session::get('app_id');
        $this->page['recentNotification'] = Notification::where('app_id', $app_id)
            ->with('send_tokens')
            ->where('is_send', 1)
            ->orderBy('created_at', 'desc')->take(5)->get();
    }

}
