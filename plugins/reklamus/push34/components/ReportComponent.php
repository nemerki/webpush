<?php namespace Reklamus\Push34\Components;

use Cms\Classes\ComponentBase;
use Reklamus\Push34\Models\Notification;
use Illuminate\Support\Facades\Session;

class ReportComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Report',
            'description' => 'Repor Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $app_id = Session::get('app_id');
        $this->page['notifications'] = Notification::where('app_id', $app_id)
            ->where('is_send', 1)
            ->orderBy('created_at', 'desc')->get();
    }
}
