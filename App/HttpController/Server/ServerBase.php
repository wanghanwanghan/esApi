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

        foreach ($req->getRequestParam() as $k=>$v)
        {
            go(function () use ($k,$v)
            {
                $redis=Redis::defer('redis');
                $redis->set($k,$v);

                sleep(3);
            });
        }

        //清除pool中的定时器
        Timer::getInstance()->clearAll();

        $this->writeJson(200,[],'success');

        return true;
    }
}
