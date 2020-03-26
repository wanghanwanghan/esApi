<?php

namespace App\HttpController\Server;

use Carbon\Carbon;
use EasySwoole\Component\Singleton;

class WriteLog extends ServerBase
{
    use Singleton;

    private $type=[
        'debug',
        'info',
        'warning',
        'danger',
    ];

    public function writeLog($content='',$type='info',$path='',$logFileName='')
    {
        //非字符串的内容处理一下
        if (!empty($content) && !is_string($content)) $content=json_encode($content);

        if (!in_array(strtolower($type),$this->type)) return true;

        $content='['.Carbon::now()->format('Y-m-d H:i:s').'] ['.strtoupper($type).'] : '.$content.PHP_EOL;

        if (empty($path))
        {
            $path=LOGPATH;
        }else
        {
            is_dir($path) ?: mkdir($path,0777);

            $path.=DIRECTORY_SEPARATOR;
        }

        if (empty($logFileName)) $logFileName='run.log.'.Carbon::now()->format('Ymd');

        file_put_contents($path.$logFileName,$content,FILE_APPEND|LOCK_EX);

        return true;
    }





}
