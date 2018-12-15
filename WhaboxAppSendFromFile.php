
<?php

function guidv4()
{
    if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
function sendUsingExcel($number,$message)
{
$token="d877512fe6ec552b7f8d69fe70de83d75c0dc050ee15e";
$uuid= "51959045176";
$to= $number;
$custom_uid = guidv4();
$text= $message;

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://www.waboxapp.com/api/send/chat"); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "token=".$token."&uid=".$uuid."&to=".$to."&custom_uid=".$custom_uid."&text=".$text); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
curl_setopt($ch, CURLOPT_MAXREDIRS, 5); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_TIMEOUT, 20); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 25); 

$response = curl_exec($ch); 
$info = curl_getinfo($ch); 
curl_close ($ch);

return $response;
//echo($info);
}

?>

