<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use EasySwoole\EasySwoole\Logger;

class WriteLog extends ServerBase
{
    use Singleton;

    private $type=[
        'debug',
        'info',
        'warning',
        'danger',
    ];

    public function writeLog($type='info',$content='',$path='',$logFileName='run.log')
    {
        if (!in_array(strtolower($type),$this->type)) return true;

        //非字符串的内容处理一下
        if (!empty($content) && !is_string($content)) $content=json_encode($content);

        if (empty($path))
        {
            $path=LOGPATH;
        }else
        {
            is_dir($path) ?: mkdir($path,0777);

            $path.=DIRECTORY_SEPARATOR;
        }

        var_dump(Logger::getInstance()->log('log level info',Logger::LOG_LEVEL_INFO,'DEBUG'));

        return true;
    }




}
