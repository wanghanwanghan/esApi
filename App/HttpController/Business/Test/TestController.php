<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use Hashids\Hashids;

class TestController extends BusinessBase
{
    public function index()
    {



        go(function ()
        {
            $obj=new Hashids();

            var_dump($obj->encode(12345));

        });

        go(function ()
        {
            $obj=new Hashids();

            var_dump($obj->encode(12345));

        });

        go(function ()
        {
            $obj=new Hashids();

            var_dump($obj->encode(12345));

        });





        $this->writeJson(200,[],'success');

        return true;
    }
}
