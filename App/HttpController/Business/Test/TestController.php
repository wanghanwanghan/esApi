<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function onRequest(?string $action): ?bool
    {
        parent::onRequest($action);

        echo 'TestController中的onRequest'.PHP_EOL;

        return true;
    }

    public function afterAction(?string $actionName): void
    {
        parent::afterAction($actionName);

        echo '我的afterAction'.PHP_EOL;
    }

    public function index()
    {
        $ids=GetHashids::getInstance()->getObj();

        $encode=$ids->encode(13800);

        $decode=$ids->decode($encode);








        $this->writeJson(200,[$encode,$decode],'success');

        return true;
    }
}
