<?php

namespace App\HttpController\Server;

use App\HttpController\Index;
use EasySwoole\RedisPool\Redis;

class ServerBase extends Index
{
    public function index()
    {
        $req=$this->request();

        var_dump($req);







        $this->writeJson(200,$req->getRequestParam(),'success');

        return true;
    }
}
