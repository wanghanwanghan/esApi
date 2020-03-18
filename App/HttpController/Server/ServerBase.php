<?php

namespace App\HttpController\Server;

use App\HttpController\Index;
use EasySwoole\Component\Timer;
use EasySwoole\RedisPool\Redis;

class ServerBase extends Index
{
    public function index()
    {
        $req=$this->request();



        for ($i=1000;$i--;)
        {
            go(function () use ($i)
            {
                $redis=Redis::defer('redis');
                $redis->set($i,$i.'w');
            });
        }






        //清除pool中的定时器
        Timer::getInstance()->clearAll();

        $this->writeJson(200,[],'success');

        return true;
    }
}
