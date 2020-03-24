<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\DataSource\Fahai;

class TestController extends BusinessBase
{
    public function onRequest(?string $action): ?bool
    {
        parent::onRequest($action);

        return true;
    }

    public function afterAction(?string $actionName): void
    {
        parent::afterAction($actionName);
    }

    public function index()
    {
        $url='https://api.fahaicc.com/v2/query/sat?';

        $rt=time()*1000;

        $sign_num=md5('25DwLghyWYbHM9P0OjwW'.$rt);

        $json_data=[
            'dataType'=>'satparty_qs',
            'keyword'=> '小米',
            'pageno'=>1,
            'range'=>10
        ];

        $data=[
            'authCode'=>'25DwLghyWYbHM9P0OjwW',
            'rt'=>$rt,
            'sign'=>$sign_num,
            'args'=>json_encode($json_data)
        ];



        $curl=curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output=curl_exec($curl);
        curl_close($curl);



        $this->writeJson(200,json_decode($output,1),'suc');


        return true;
    }
}
