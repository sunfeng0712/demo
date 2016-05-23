<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/23
 * Time: 15:26
 */
namespace Mysql;
use Mysql;
class Db
{
    private $db;//实例化对象
    private $conn;//连接数据库

    public function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        try{
            $this->conn = new \mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);
            if(mysqli_connect_errno())
            {
                echo '数据库连接错误，错误代码是:'.mysqli_connect_errno();
                die();
            }
            $this->conn->set_charset('utf8');
            return $this->conn;
        }catch (\Exception $e){
            $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->conn->close();
    }
    //执行insert update
    public function query($sql)
    {
        try{
            $sth = $this->conn->query($sql);
            $this->db = $sth;
            return $this;
        }catch (\Exception $e)
        {
            die($e->getMessage());
        }
    }
    //返回一条结果 obj
    public function row()
    {
        if($this->db)
        {
            return $this->db->fetch_object();
        }
    }
    //返回一条结果 数组
    public function rowArr()
    {
        if($this->db)
        {
            return $this->db->fetch_assoc();
        }
    }
    //返回多条结果
    public function result()
    {
        if($this->db)
        {
             return $this->db->fetch_all();
        }
    }
    //返回多条结果
    public function result1()
    {
        if($this->db)
        {
            return $this->db->fetch_array();
        }
    }
    public function selectTableName($name)
    {
        try{
            if(!empty($name))
            {
                $sql = "SELECT count(*) AS `total` from ".$name;
                $this->query($sql);
                return $this;
            }
        }catch (\Exception $e){
            $e->getMessage();
        }

    }
    //获取总数
    public function countNums()
    {
        if($this->db)
        {
            $row = $this->row();
            return $row->total;
        }
    }
    //插入一条数据
    public function insert($sql)
    {
        try{
            $this->query($sql);
            $affected_row = $this->affected_rows;
            return $affected_row;
        }catch (\Exception $e)
        {
            $e->getMessage();
        }
    }


}