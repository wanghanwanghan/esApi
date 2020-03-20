<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;
use EasySwoole\Pool\Manager;

class TestController extends BusinessBase
{
    public function index()
    {
        $ids=GetHashids::getInstance()->getObj();

        $encode=$ids->encode(13800);

        $decode=$ids->decode($encode);








        $this->writeJson(200,[$encode,$decode],'success');

        return true;
    }
}
