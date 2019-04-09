<?php
/**
 * Created by PhpStorm.
 * User: mmehe
 * Date: 20.11.2018
 * Time: 02:03
 */

use Reklamus\Push34\Classes\Firebase;

Route::get('/cron', function () {

    $fb = new Firebase();
    $notifications = \Reklamus\Push34\Models\Notification::where('is_send', 0)->where('is_crone', 1)->get();

    date_default_timezone_set("Asia/Baku");
//var_dump(date('Y-m-d H:i', $event['send_at']));die;
    foreach ($notifications as $notification) {
        if (date('Y-m-d H:i') == date('Y-m-d H:i', $notification['push_date'])) {

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

                    $sendtoken = \Reklamus\Push34\Models\SendToken::where('notification_id', $notification_id)->where('id', $token_id)->update(['is_send' => 1]);
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
    }

});


Route::get('/cron', function () {
    $actions = \Reklamus\Push34\Models\Action::where('status', 1)->get();

    foreach ($actions as $action) {
        if (date('Y-m-d') == date('Y-m-d', $notification['end_date'])) {

        }
    }
});
