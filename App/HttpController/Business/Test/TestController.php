<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\GetHashids;

class TestController extends BusinessBase
{
    public function onRequest(?string $action): ?bool
    {
        echo '我的onRequest'.PHP_EOL;
    }

    public function afterAction(?string $actionName): void
    {
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
