<?php
/**
 * Created by PhpStorm.
 * User: sufeng
 * Date: 2016/5/21
 * Time: 18:12
 */
namespace Log;
define("LOG",  dirname(__FILE__) .'/logs'  );
class Log
{
    const LOGFILE = 'curr.log';
    //判断是否备份
    public static function is_bak()
    {
        $logDir = LOG.'/'.self::LOGFILE;//D: /WWW /git_clone /sunfeng /Log/logs/curr.log

        if(!is_dir(LOG))
        {
            mkdir(LOG,0777);
             //touch(LOG);//Linux上创建目录的方法
            return $logDir;
        }
        //存在--清缓存
        clearstatcache(true,$logDir);
        $size = filesize($logDir);
        if($size <= 1024*1024)
        {
            return $logDir;
        }else
        {
            if(!self::bak())
            {
                return $logDir;
            }else
            {
                touch($logDir);
                return $logDir;
            }
        }
    }
    //备份
    public static function bak()
    {
        $logDir = LOG.'/'.self::LOGFILE;
        $bak =  LOG . '/' . date('ymd') . mt_rand(10000,99999) . '.bak';
        touch($bak);
        return rename($logDir,$bak);
    }
    //写入
    public function write($loginfo)
    {
        $loginfo .= '\r\n';
        //判断是否要备份
        $logDir = self::is_bak();
        $fh = fopen($logDir,'ab');
        fwrite($fh,$loginfo);
        fclose($fh);
    }
}
$logObj = new Log();
for($i=0;$i<=3000;$i++)
{
    $logObj->write('测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功]\
    测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测
    试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功
    测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成
    功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试
    成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功测试成功');
}