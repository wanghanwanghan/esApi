<?php

namespace App\HttpController\Server\DataSource;

use App\HttpController\Server\ServerBase;
use EasySwoole\Component\Singleton;

class Fahai extends ServerBase
{
    use Singleton;

    private $authCode='25DwLghyWYbHM9P0OjwW';

    //发送请求
    public function sendPost($url,$body)
    {
        $rt=time()*1000;

        $sign_num=md5($this->authCode,$rt);

        $doc_type=$body['doc_type'];
        $keyword=$body['keyword'];
        $pageno=$body['pageno'];
        $range=$body['range'];

        $json_data=[
            'dataType'=>$doc_type,
            'keyword'=> $keyword,
            'pageno'=>$pageno,
            'range'=>$range
        ];

        $json_data=json_encode($json_data);

        $data=[
            'authCode'=>$this->authCode,
            'rt'=>$rt,
            'sign'=>$sign_num,
            'args'=>$json_data
        ];

        $response_data=curl_post($url, $data);

        return $response_data;
    }


}
