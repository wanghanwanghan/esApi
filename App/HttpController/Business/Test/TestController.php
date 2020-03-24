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
        $data=[
            'doc_type' => 'satparty_qs',
            'keyword' => '小米',
            'pageno' => 1,
            'range'=>10
        ];
        $res=Fahai::getInstance()->sendPost($url,$data);


        $this->writeJson(200,$res,'suc');


        return true;
    }
}
