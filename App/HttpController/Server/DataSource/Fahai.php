<?php

namespace App\HttpController\Server\DataSource;

use App\HttpController\Server\ServerBase;
use EasySwoole\Component\Singleton;
use EasySwoole\HttpClient\HttpClient;

class Fahai extends ServerBase
{
    use Singleton;

    private $token='25DwLghyWYbHM9P0OjwW';

    public function send($url,$data)
    {
        $rt=time()*1000;

        $data=[
            'authCode'=>'25DwLghyWYbHM9P0OjwW',
            'rt'=>$rt,
            'sign'=>md5($this->token.$rt),
            'args'=>json_encode([
                'dataType'=>$data['dataType'],
                'keyword'=>$data['keyword'],
                'pageno'=>$data['pageno'] ?? 1,
                'range'=>$data['range'] ?? 20
            ])
        ];

        return $this->sendCurl($url,$data);
    }

    private function sendCurl($url,$data)
    {
        $cli=new HttpClient();

        $cli->setUrl($url);

        $cli->setEnableSSL(false);

        return json_decode($cli->post($data)->getBody(),1);
    }
}
