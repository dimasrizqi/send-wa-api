<?php
$token                          = '9gyf19de6dfp5ya0';
$nomor_handphone        = '6287770696141';
#echo "Notifikasi telah dikirim ke nomor" .$nomor_handphone", cek whatsapp\n";
   #echo implode("\n", $matches[0]);
$message = 'ada serangan portscan dari ip '.$ipaddress.' tanggal '.date('Y-m-d H:i:s A').' ';
$client = new \GuzzleHttp\Client();
$res = $client->request('POST', 'https://eu2.chat-api.com/instance6549/message?token='.$token.'&phone='.$nomor_handphone.'&body='.$message.'');
echo $res->getStatusCode();
echo $res->getBody();
?>
       
