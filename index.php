<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/20
 * Time: 14:46
 */
require './db/Db.class.php';
$db = new DB\Db();
$data = $db->exec("select * from sf_admin_user")->row();
echo "<pre>";
var_dump($data);die;