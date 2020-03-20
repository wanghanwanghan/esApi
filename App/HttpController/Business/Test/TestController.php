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


        go(function ()
        {
            $obj=Manager::getInstance()->get('log')->getObj();

            $obj->queryBuilder()->get('china_area');

            var_dump($obj->execBuilder());

            Manager::getInstance()->get('log')->recycleObj($obj);
        });


        go(function ()
        {
            $obj=Manager::getInstance()->get('project')->getObj();

            $obj->queryBuilder()->get('users');

            var_dump($obj->execBuilder());

            Manager::getInstance()->get('project')->recycleObj($obj);
        });




        $this->writeJson(200,[],'success');

        return true;
    }
}
