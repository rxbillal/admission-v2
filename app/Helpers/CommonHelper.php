<?php

namespace App\Helpers;


use Twilio\Rest\Client;
use Exception;

class CommonHelper
{
    static function SendSms($receiverNumber,  $message)
    {
        try {

            $account_sid = env('TWILO_SID');
            $auth_token = env('TWILO_TOKEN');
            $twilio_number = env('TWILO_NUMBER');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

            return 'SMS Sent Successfully.';

        } catch (Exception $e) {
            return $e;
        }
    }
    public static function dateFormatHuman($date){
        return  date("j F, Y", strtotime($date));
    }
}
