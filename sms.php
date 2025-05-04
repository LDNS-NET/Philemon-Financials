<?php
require 'vendor/autoload.php';

use Africastalking\Africastalking;

function sendLoanSMS($phoneNumber, $trackingCode)
{
    $username = 'your-username'; // Replace with Africastalking username
    $apiKey = 'your-api-key'; // Replace with Africastalking API key

    $AT = new Africastalking($username, $apiKey);
    $sms = $AT->sms();

    try {
        $result = $sms->send([
            'to' => $phoneNumber,
            'message' => "Thank you for applying for a loan. Your tracking code is $trackingCode.",
        ]);
        return true;
    } catch (Exception $e) {
        return false;
    }
}