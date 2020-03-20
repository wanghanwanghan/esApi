<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function index()
    {
        $ids=GetHashids::getInstance()->getObj();





        $this->writeJson(200,$ids->decode('8qQIPx'),'success');

        return true;
    }
}
