<?php


namespace App\Http\Traits;

use App\Models\PhoneToken;
use App\Models\PhoneTokenDoctor;


trait Notifications
{
    protected function notification($id,$title,$message){
        $url = 'https://fcm.googleapis.com/fcm/send';

        $get=PhoneToken::where('user_id', $id)->pluck('phone_token');

        $fields = array (
            'registration_ids' => $get,
            'data' => array (
                "title" => $title,
                "message" => $message,
            ),
            'notification' => array (
                "title" => $title,
                "message" => $message,
            )
        );
        $fields = json_encode ( $fields );

        $headers = array (
            'Authorization: key=' . "AAAAhIocbXo:APA91bEdSt4EL1HQNbzoGCveHD1t2AWa0MtnftK49N6JniqoAdPnChA_slXRnMn1ccLZsrBe-xK4y39cBBBX28Gg9rAK9mBFykisJbwz4H3nesJ4VClBAoFx7HT9jL3JkEFh9vGJkiJd",
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        curl_close ( $ch );

    }

    protected function doctor_notification($id,$title,$message){
        $url = 'https://fcm.googleapis.com/fcm/send';

        $get=PhoneTokenDoctor::where('doctor_id', $id)->pluck('phone_token');

        $fields = array (
            'registration_ids' => $get,
            'data' => array (
                "title" => $title,
                "message" => $message,
            ),
            'notification' => array (
                "title" => $title,
                "message" => $message,
            )
        );
        $fields = json_encode ( $fields );

        $headers = array (
            'Authorization: key=' . "AAAAhIocbXo:APA91bEdSt4EL1HQNbzoGCveHD1t2AWa0MtnftK49N6JniqoAdPnChA_slXRnMn1ccLZsrBe-xK4y39cBBBX28Gg9rAK9mBFykisJbwz4H3nesJ4VClBAoFx7HT9jL3JkEFh9vGJkiJd",
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        curl_close ( $ch );

    }

}
