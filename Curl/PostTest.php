<?php
//$url = "http://127.0.0.1/monster/public/index.php/test";
//$url = "http://127.0.0.1/PrimaryPHP/Curl/recieve.php";
$url = "http://127.0.0.1/spirit/friendsList";


$post_data = array(
    'id' => "10000000000001"
//    'name' => 'xxxxx'
// 'password' => 'password'
);
$ch = curl_init();
// print_r($ch);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

$return = curl_exec($ch);
curl_close($ch);

print_r($return);