<?php
  namespace Reklamus\Push34\Classes;

class Firebase
{
    const AUTH_KEY = 'AAAAejc-tXk:APA91bGo3HSssfXtfBU2J5D0wzimRrRPMd-2bJ2wa35SqSblhcz_FL4GjOqagz0TUmxHn6lXEWHD0z_LHzGPrDsExOBd9C3kOSeY45W0T5QbuPQdE2ZcDXh4S8ANqcg8k-8-0W_eofh9';

    public function __construct()
    {

    }

    public function send($tokens, $title, $body)
    {

        if($tokens != NULL){
            $msg = array
            (
                'body'  => $body,
                'title' => $title,
                'icon'  => 'myicon',/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
            );
            $fields = array
            (
                'registration_ids' => $tokens,
                'notification'  => $msg
            );
            $headers = array
            (
                'Authorization: key=' . self::AUTH_KEY,
                'Content-Type: application/json'
            );
            #Send Reponse To FireBase Server
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

            $result = curl_exec ( $ch );
            $status = json_decode($result);
            curl_close ( $ch );
            return $status;
        }
        else {
            return 0;
        }

    }
}