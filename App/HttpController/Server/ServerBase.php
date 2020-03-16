<?php

namespace App\HttpController\Server;

use App\HttpController\Index;

class ServerBase extends Index
{
    public function index()
    {
        $this->writeJson(200,['wanghan','duanran'],'success');

        return true;
    }
}
