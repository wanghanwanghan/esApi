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

        $res=$cli->post(http_build_query($data));

        return $res->getBody();
    }
}
