<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 15:31
 */
header('Content-Type:text/html;Charset=utf-8');
//define('ROOT_PATH', dirname(__FILE__));
define('DB_HOST', 'localhost'); //数据库服务器地址
define('DB_USER', 'root');  //数据库用户名
define('DB_PASSWORD', 'root');//数据库密码
define('DB_NAME', 'tpshop');  //数据库名称
define('DB_PORT', '3306');  //数据库端口

include './db.php';
$db = new \Mysql\Db();
$data1 = $db->query('select * from tp_admin where admin_id= 1')->row();
$data2 = $db->query('select * from tp_admin where admin_id= 1')->rowArr();
$data3 = $db->query('select * from tp_admin')->result();
$data4 = $db->query('select * from tp_admin')->result1();
$data5 = $db->selectTableName('tp_admin')->countNums();
$data5 = $db->insert("INSERT INTO tp_admin (`username`,`email`,``password)")->countNums();
echo "<pre>";
var_dump($data5);die;