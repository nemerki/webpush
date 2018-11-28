<?php namespace Reklamus\Push34\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Reklamus\Push34\Models\Action;
use Reklamus\Push34\Models\Order;
use Reklamus\Push34\Models\Plan;
use RainLab\User\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentComponent extends ComponentBase
{
    public $plan;
    public $period;
    public $value;
    public $price;

    public function componentDetails()
    {
        return [
            'name' => 'Payment',
            'description' => 'Payment Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    protected function prepareVars()
    {
        $this->price = $this->page['price'] = Session::get('price');
        $this->period = $this->page['period'] = Session::get('period');
        $this->value = $this->page['value'] = Session::get('value');
        $this->plan = $this->page['plan'] = Session::get('plan');


    }

    public function onRun()
    {

        $this->prepareVars();
        $this->planDetail();

    }

    public function planDetail()
    {
        $model = Plan::where("id", $this->plan)->first();
        $this->page['plan_name'] = $model->name;
        $this->page['plan_period'] = $this->period;
        $this->page['plan_price'] = $this->price;


    }

    public function onPayment()
    {
        $this->prepareVars();
        $user_id = Auth::getUser()->id;
        $plan_id = $this->plan;
        $amount = $this->price;
        $now = Carbon::now();

        if ($this->period == 'month') {
            $end_date = Carbon::now()->addMonth();
        } elseif ($this->period == 'year') {
            $end_date = Carbon::now()->addYear();
        }
        $day = $end_date->diffInDays(Carbon::now());

//        if ($payment == "success") {
        Order::create([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'amount' => $amount,
        ]);

        Action::create([
            'user_id' => $user_id,
            'plan_id' => $plan_id,
            'day' => $day,
            'end_date' => $end_date,

        ]);

//        }
    }

}
