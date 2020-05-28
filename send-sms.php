<?php
// Import
require('JustSendClient.php');

// Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

try
{
    $curl = new JustSendClient();
    $curl->SetMethod("POST");
    $curl->SetJson();

    // Token
    $curl->AddToken('API-KEY-HERE');
    
    // Wiadomość
    $curl->AddUrl('https://justsend.pl/api/rest/v2/bulk/send');
    $curl->AddData("name", "Powiadomienie");
    $curl->AddData("groupId", 0);
    $curl->AddData("sendDate", date(DATE_ATOM, time()));    
    $curl->AddData("bulkVariant","ECO"); // ECO, PRO, FULL
    $curl->AddData("doubleEncode", true);
    
    // Treść
    $curl->AddData("from", "HellGirl");
    $curl->AddData("message", "Testowa wiadomość");    
    // Pojedyńczy odbiorca
    $curl->AddData("to", array("500111222"));    
    // Kilku odbiorców
    // $curl->AddData("to", array("500111222","500222333"));

    // Send
    echo $curl->Send();

}catch(Exception $e){
    print_r($e);
}

/*
try
{
    $curl = new JustSendClient();
    $curl->SetMethod("POST");
    $curl->SetJson();

    // Token
    $curl->AddToken('API-KEY-HERE');
    
    // Lub dla pojedyńczego odbiorcy
    $curl->AddUrl('https://justsend.pl/api/rest/v2/message/send');
    
    // Wiadomość    
    $curl->AddData("bulkVariant","ECO"); // ECO, PRO, FULL
    $curl->AddData("doubleEncode", true);
    $curl->AddData("from", "HellGirl");
    $curl->AddData("message", "Testowa wiadomość");
    $curl->AddData("to", "500111222");
    
    // Send
    echo $curl->Send();
}
catch(Exception $e)
{
    print_r($e);
}
*/
?>
