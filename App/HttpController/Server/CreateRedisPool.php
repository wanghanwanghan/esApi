<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\RedisPool\Redis;

class CreateRedisPool extends ServerBase
{
    use Singleton;

    //注册redis连接池，只能在mainServerCreate中用
    public function createRedis()
    {
        $conf=new RedisConfig();
        $conf->setHost('47.106.169.68');
        $conf->setPort('56379');
        $conf->setAuth('wanghan123');

        $redisPoolConfig=Redis::getInstance()->register('redis',$conf);
        $redisPoolConfig->setMinObjectNum(5);
        $redisPoolConfig->setMaxObjectNum(20);
        $redisPoolConfig->setAutoPing(10);

        return true;
    }
}
