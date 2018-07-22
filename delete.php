<?php
$email = 'EMAIL_ADDRESS';
$list_id = 'LIST _ID';
$api_key = 'API_KEY';

$data_center = substr($api_key,strpos($api_key,'-')+1);

$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members/'. md5(strtolower($email));

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
?>