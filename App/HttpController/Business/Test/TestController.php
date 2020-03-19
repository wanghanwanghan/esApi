<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use App\HttpController\Server\GetImagick;
use EasySwoole\RedisPool\Redis;

class TestController extends BusinessBase
{
    public function index()
    {
        $res=$this->request()->getUploadedFile('img');


        //(new GetImagick())->getObj()->make($res->);








        $this->writeJson(200,[$res->getTempName(),$res->getClientFilename(),$res->getClientMediaType()],'success');

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
