<?php

namespace App\HttpController\Server;

use EasySwoole\HttpClient\HttpClient;

class ServerBase
{
    protected function curl($url,$data)
    {
        $cli=new HttpClient();

        $cli->setUrl($url);

        $cli->setEnableSSL(false);

        $res=$cli->post($data);

        return $res;
    }
}
