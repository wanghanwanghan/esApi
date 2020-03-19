<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use EasySwoole\RedisPool\Redis;
use Intervention\Image\ImageManager;

class TestController extends BusinessBase
{
    public function index()
    {
        $res=$this->request()->getUploadedFile('img');


        $obj=new ImageManager(['driver' => 'imagick']);

        $image=$obj->make($res->getTempName())->save('/wanghan.jpg');







        $this->writeJson(200,$res->getTempName(),'success');

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
