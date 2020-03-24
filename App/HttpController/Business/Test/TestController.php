<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use EasySwoole\HttpClient\HttpClient;

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

        $cli=new HttpClient('http://easyswoole.com');

        $response = $cli->get();



        $this->writeJson(200,$response,'su');

        return true;
    }
}
