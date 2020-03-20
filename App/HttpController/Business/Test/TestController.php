<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function index()
    {
        $ids=GetHashids::getInstance()->getObj();

        $encode=$ids->encode(13800);

        $decode=$ids->decode($encode);





        $res=[];

        for ($i=10;$i--;)
        {
            $res[]=Helper::getInstance()->randomUUID();
        }




        $this->writeJson(200,$res,'success');

        return true;
    }
}
