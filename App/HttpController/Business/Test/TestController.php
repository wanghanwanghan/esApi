<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use EasySwoole\RedisPool\Redis;

class TestController extends BusinessBase
{
    public function index()
    {
        $request=$this->request()->getRequestParam();

        $this->redisTest();

        $this->writeJson(200,Helper::getInstance()->str_random(),'success');

        return true;
    }

    public function redisTest()
    {
        for ($i=1000;$i--;)
        {
            go(function ()
            {
                $obj=Redis::defer('redis');

                $obj->select(1);

                $obj->set(123,321);
            });
        }

        return true;
    }
}
