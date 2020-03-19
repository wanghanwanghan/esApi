<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use EasySwoole\HttpClient\HttpClient;
use EasySwoole\RedisPool\Redis;

class TestController extends BusinessBase
{
    public function index()
    {
        $res=$this->request()->getRequestParam();
        $res['random']=Helper::getInstance()->str_random();

        $res['header']=$this->request()->getHeader('authorization');





        go(function ()
        {
            $url = 'https/www.baidu.com';
            $test = new HttpClient($url);

            $test->setHeader('myHeader','myHeader');

            $ret = $test->postJSON(json_encode(['json'=>1]));

            var_dump($ret->getBody());
        });







        $this->writeJson(200,$res,'success');

        return true;
    }

    public function redisTest()
    {
        for ($i=1000;$i--;)
        {
            go(function ()
            {
                $obj=Redis::defer('redis');

                $obj->select(mt_rand(0,7));

                $obj->set(Helper::getInstance()->str_random(),Helper::getInstance()->str_random());
            });
        }

        return true;
    }
}
