<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 15:18
 */
namespace Mysql;
class MysqliDb{
    //获取句柄对象
    static public  function getDB()
    {
        $_mysqli = new \mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);
        if(mysqli_connect_errno())
        {
            echo '数据库连接错误，错误代码是:'.mysqli_connect_errno();
            die();
        }
        $_mysqli->set_charset('utf8');
        return $_mysqli;
    }
    //清理，释放资源
    static public function unDB(&$_result,&$db)
    {
        if(is_object($_result))
        {
            $_result->free();
            $_result = null;
        }
        if(is_object($db))
        {
            $db->free();
            $db = null;
        }
    }
}