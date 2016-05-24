<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 18:47
 */
include './storage/init.php';
define('auth_url','?storage.php&c=index&a=auth');
define('upload_url','?storage.php&c=index&a=uploadfile');
$url = new Curl\Curl();
$data = array('access_key'=>storage_access_key,'secret_key'=>storage_secret_key);
$tokenJson= $url->post(storage_base_url.auth_url,$data);
if($tokenJson){
    $tokenInfo = json_decode($tokenJson,true);
    $token = $tokenInfo['token'];
    $upload_url = $url->post(storage_base_url.$upload_url,array('token'=>$token));
    include './upload.html';
}else{
    die('远程服务器地址不对，请检查远程地址');
}
