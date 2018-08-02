<?php 
//require "vendor/autoload.php";
date_default_timezone_set('Asia/Jakarta');
$token = '9gyf19de6dfp5ya0';
$nomor_handphone = '6287770696141';
/*$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
   $ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
else
    $ipaddress = 'tidak diketahui';
//skrip baca output snotr log
//make string src addres */
#$message = 'ada serangan portscan dari ip '.$ipaddress.' tanggal '.date('Y-m-d H:i:s A').' ';
$message = 'ada pesan dari 08989541406' tanggal '.date('Y-m-d H:i:s A').' ';
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', 'https://eu2.chat-api.com/instance6549/message?token='.$token.'&phone='.$nomor_handphone.'&body='.$message.'');
echo $res->getStatusCode();
echo $res->getBody();

 ?>
