<?php
/**
 * Created by PhpStorm.
 * User: leo
 * Date: 2015/3/2
 * Time: 10:12
 */

//获取域名或主机地址
var_dump($_SERVER['REQUEST_URI']);

if ($_SERVER['HTTP_HOST'] == '127.0.0.1') {
    echo 'hehe';
}

echo $_SERVER['HTTP_HOST'] . "<br>"; #localhost

//获取网页地址
echo $_SERVER['PHP_SELF'] . "<br>"; #/blog/testurl.php

echo '获取网址参数' . '<br>';
echo $_SERVER["QUERY_STRING"] . "<br>"; #id=5

//获取用户代理
echo $_SERVER['HTTP_REFERER'] . "<br>";

//获取完整的url
echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '<br>';
echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '<br>';

//包含端口号的完整url
echo 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"] . '<br>';
#http://localhost:80/blog/testurl.php?id=5

//只取路径
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
echo dirname($url);
#http://localhost/blog