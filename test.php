<?php  

$url = 'http://dynupdate.no-ip.com/ip.php';
$proxy = '67.205.151.68:8080';
//$proxyauth = 'user:password';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);         // URL for CURL call
curl_setopt($ch, CURLOPT_PROXY, $proxy);     // PROXY details with port
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);   // Use if proxy have username and password
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); // If expected to call with specific PROXY type
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  // If url has redirects then go to the final redirected URL.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);  // Do not outputting it out directly on screen.
curl_setopt($ch, CURLOPT_HEADER, 1);   // If you want Header information of response else make 0
$curl_scraped_page = curl_exec($ch);
curl_close($ch);

echo $curl_scraped_page;