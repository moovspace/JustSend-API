# JustSend REST API PHP
Justsend rest php api. How to send sms message from php rest api (single and multiple messages).

### Send sms to single recipient
```php
try
{
    $curl = new JustSendClient();
    $curl->SetMethod("POST");
    $curl->SetJson();

    // Token
    $curl->AddToken('API-KEY-HERE');
    
    // Single number
    $curl->AddUrl('https://justsend.pl/api/rest/v2/message/send');
    
    // Mesage  
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
```   

### Send sms to multiple recipients
```php
<?php
// Import client
require('JustSendClient.php');

try{

    $curl = new JustSendClient();
    $curl->SetMethod("POST");
    $curl->SetJson();

    // Token
    $curl->AddToken('API-KEY-HERE');
    
    // Url
    $curl->AddUrl('https://justsend.pl/api/rest/v2/bulk/send');    
    
    // Message
    $curl->AddData("name", "Powiadomienie");
    $curl->AddData("groupId", 0);
    $curl->AddData("sendDate", date(DATE_ATOM, time()));        
    $curl->AddData("bulkVariant","ECO"); // ECO, PRO, FULL
    $curl->AddData("doubleEncode", true);
    
    // Treść, odbiorcy    
    $curl->AddData("from", "Vege");
    $curl->AddData("message", "Hi. Testowa wiadomość!");    
    
    // Jeden odbiorca
    $curl->AddData("to", array("500100200"));
    
    // Kilku odbiorców
    // $curl->AddData("to", array("500100200","500200999"));

    // Send
    echo $curl->Send();

}catch(Exception $e){
    print_r($e);
}
```

### Display php errors
```php
<?php
// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
```
