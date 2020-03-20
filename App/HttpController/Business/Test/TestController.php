<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function index()
    {
        $ids=GetHashids::getInstance(['wanghan',6])->getObj();

        $encode=$ids->encode(13800);

        $decode=$ids->decode($encode);



        $this->writeJson(200,[$encode,$decode],'success');

        return true;
    }
}
