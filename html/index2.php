<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url"); 
require "vendor/autoload.php";
date_default_timezone_set('Asia/Jakarta');
$token 				= '528x3a519qemlz08';
$nomor_handphone 	= '6282211984187';
$ipaddress = '';
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
//make string src addres

$file = '/var/log/auth.log';
$searchfor = 'ICMP';

// the following line prevents the browser from parsing this as HTML.
header('Content-Type: text/plain');

// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);
// escape special characters in the query
$pattern = preg_quote($searchfor, '/');
// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";
// search, and store all matching occurences in $matches
if(preg_match_all($pattern, $contents, $matches)){
   echo "Notifikasi terlah dikirim, cek whatsapp\n";
#untuk kirim pesan
#echo implode("\n", $matches[0]);
$message = 'terjadi serangan PINGATTACK dari ip '.$ipaddress.' tanggal '.date('Y-m-d H:i:s A').' ';
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', 'https://eu9.chat-api.com/instance7464/message?token='.$token.'&phone='.$nomor_handphone.'&body='.$message.'');
echo $res->getStatusCode();
echo $res->getBody();

}
else{
   echo "Tidak ada serangan";
}
//untuk kosonging auth log
$current .= " ";
// Write the contents back to the file
file_put_contents($file, $current);

/*
$message = 'ada serangan portscan dari ip '.$ipaddress.' tanggal '.date('Y-m-d H:i:s A').' ';
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', 'https://eu2.chat-api.com/instance6549/message?token='.$token.'&phone='.$nomor_handphone.'&body='.$message.'');
echo $res->getStatusCode();
echo $res->getBody();
*/
?>

