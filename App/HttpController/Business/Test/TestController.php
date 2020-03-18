<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;

class TestController extends BusinessBase
{
    public function index()
    {
        $request=$this->request()->getRequestParam();

        $this->writeJson(200,$request,'success');

        return true;
    }
}
