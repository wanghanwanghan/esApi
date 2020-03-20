<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function index()
    {
        $ids=GetHashids::getInstance()->getObj();

        $encode=$ids->encode(13800);

        $decode=$ids->decode($encode);




        go(function ()
        {
            var_dump(md5(uniqid(mt_rand(),true)));
        });

        go(function ()
        {
            var_dump(md5(uniqid(mt_rand(),true)));
        });

        go(function ()
        {
            var_dump(md5(uniqid(mt_rand(),true)));
        });






        $this->writeJson(200,[mt_rand(0,3),mt_rand(0,3),mt_rand(0,3)],'success');

        return true;
    }
}
