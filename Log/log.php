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
    //�ж��Ƿ񱸷�
    public static function is_bak()
    {
        $logDir = LOG.'/'.self::LOGFILE;//D: /WWW /git_clone /sunfeng /Log/logs/curr.log

        if(!is_dir(LOG))
        {
            mkdir(LOG,0777);
             //touch(LOG);//Linux�ϴ���Ŀ¼�ķ���
            return $logDir;
        }
        //����--�建��
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
    //����
    public static function bak()
    {
        $logDir = LOG.'/'.self::LOGFILE;
        $bak =  LOG . '/' . date('ymd') . mt_rand(10000,99999) . '.bak';
        touch($bak);
        return rename($logDir,$bak);
    }
    //д��
    public function write($loginfo)
    {
        $loginfo .= '\r\n';
        //�ж��Ƿ�Ҫ����
        $logDir = self::is_bak();
        $fh = fopen($logDir,'ab');
        fwrite($fh,$loginfo);
        fclose($fh);
    }
}
$logObj = new Log();
for($i=0;$i<=3000;$i++)
{
    $logObj->write('���Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�]\
    ���Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ���
    �Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�
    ���Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գ�
    �����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�����
    �ɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ����Գɹ�');
}