<?php namespace Reklamus\Push34\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use RainLab\User\Facades\Auth;
use Reklamus\Push34\Models\App;
use Reklamus\Push34\Models\Notification;
use Reklamus\Push34\Models\Registrant;
use Reklamus\Push34\Models\SendToken;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Reklamus\Push34\Classes\Firebase;

class SendPushComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'SendPush',
            'description' => 'Send Push Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $app_id = Session::get('app_id');
        $apps=$this->page['app'] = App::where('id', $app_id)->first();
        $this->page['registrants'] = $registrants = $apps->registrants()->where('is_active', 1)->count();

    }


    public function onNotifySave()
    {
        $app_id = post('app_id');

        $data = Input::all();
        $data['push_date'] = post('push_date') ? strtotime(post('push_date')) : strtotime(date('Y-m-d H:i'));
        if (post('push_date') == null) {
            $data['is_cron'] = 0;
        } else {
            $data['is_cron'] = 1;
        }
        $notification = Notification::create($data);
        $get_tokens = Registrant::where('is_active', 1)->where('app_id', $app_id)->get();
        $tokens = [];
        foreach ($get_tokens as $token) {
            $tokens[] = $token['sub_id'];
        }
//biner biner göndermek için burda arrayı 1000 e bölüyoruz
        $tokens = array_chunk($tokens, 2);
        foreach ($tokens as $key => $val) {
            $js_tokens = [];
            foreach ($val as $k => $v) {
                $js_tokens[] = $v;
            }
            $js_tokens = json_encode($js_tokens);
            $send_token = new  SendToken;
            $send_token->tokens = $js_tokens;
            $send_token->notification_id = $notification->id;
            $send_token->save();
        }


        if (post('push_date') == null) {
            $fb = new Firebase();
            $notifications = \Reklamus\Push34\Models\Notification::where('is_send', 0)->get();

            date_default_timezone_set("Asia/Baku");
//var_dump(date('Y-m-d H:i', $event['send_at']));die;
            foreach ($notifications as $notification) {
                //if(date('Y-m-d H:i') == date('Y-m-d H:i', $notification['push_date'])) {

                $notification_id = $notification['id'];

                $tokens = \Reklamus\Push34\Models\SendToken::where('notification_id', $notification_id)->get();

                foreach ($tokens as $token) {
                    $token_id = $token['id'];
                    $send_tok = [];
                    foreach (json_decode($token['tokens']) as $tok) {
                        $send_tok[] = $tok;
                    }

                    $send = $fb->send($send_tok, $notification['ntitle'], $notification['ncontent']);

                    \Reklamus\Push34\Models\Notification::where('id', $notification_id)->update(['is_send' => 1]);

                    $i = 0;
                    foreach ($send->results as $res) {

                        $res->token = $send_tok[$i];
                        $i++;
                        $failure = $send->failure;
                        $success = $send->success;
                        $fairbaseResponse['failure'] = $failure;
                        $fairbaseResponse['success'] = $success;
                        $fairbaseResponse['is_send'] = 1;
                        $sendtoken = \Reklamus\Push34\Models\SendToken::where('notification_id', $notification_id)->where('id', $token_id)->update($fairbaseResponse);
//                    $db->query("Update send_token set sent = 1, success = '$success', failure = '$failure' where event_id = '$event_id' and id = '$token_id'");

                        foreach (json_decode($token['tokens']) as $tok) {
                            $ms = isset($res->message_id) ? $res->message_id : 0;

                            if (!$ms && $res->token == $tok) {

                                \Reklamus\Push34\Models\Registrant::where('sub_id', $tok)->update(['is_active' => 0]);
                            }
                        }

                    }

                }

            }
            //}
        }

    }
}
