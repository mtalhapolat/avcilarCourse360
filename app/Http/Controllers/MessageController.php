<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public static function sendMessage($phone, $message)
    {

        if (student::where('phone', $phone)->get() != null){
            self::smsbridge($phone, $message);
        }

        return 'ok';
    }


    public static function smsbridge($phone, $message)
    {

        // API URL
        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "authenticateMember";
        $params = array(
            'username' => 'kpsbilgiislem',
            'password' => '302010bB**',
            'language'=> "tr"
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr"
        );

        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $arr=explode('"', $result);
        $arr2=explode(':', $arr[10]);
        $arr3=explode(',', $arr2[1]);

        $url = 'https://iletisimapi.beyoglu.bel.tr/http';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $action = "sendMessageRequester";
        $params = array(
            'cellPhoneNumber' => $phone,
            'comment' => $message
        );
        $sp = array(
            'currentCompanyId' => 3443,
            'platform' => '3rdParty',
            'language'=> "tr",
            'originatorMemberId' => (int)$arr3[0],
            'proxyMemberId' => null,
            'sessionId'=> $arr[15]
        );
        $payload = json_encode(array("action" => $action, "params" => $params, "SP" => $sp));

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);

        $resultarr = json_decode($result, true);

        return $resultarr;
    }
}
