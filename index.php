<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/20
 * Time: 14:46
 */
require './pdo/Db.class.php';
$db = new DB\Db();
$data = $db->query("select * from user")->result();
echo "<pre>";
var_dump($data);die;