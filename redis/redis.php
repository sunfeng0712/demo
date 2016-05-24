<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/24
 * Time: 14:30
 */
define('REDIS_HOST','192.168.10.202');//本地虚拟机的第二个contos
define('REDIS_PORT','6379');
define('REDIS_PWD','123456');
define('REDIS_TIMEOUT','');
//测试
$redis = new \redis();
$redis->connect(REDIS_HOST, REDIS_PORT);
if(REDIS_PWD !='')
{
    $redis->auth(REDIS_PWD);
}
$redis->set('name','1234=');
$data = $redis->get('name');

var_dump($data);die;