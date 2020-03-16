<?php

namespace App\HttpController\Server;

use App\HttpController\Index;

class ServerBase extends Index
{
    public function index()
    {
        $req=$this->request();

        $this->writeJson(200,$req->getRequestParam(),'success');

        return true;
    }
}
