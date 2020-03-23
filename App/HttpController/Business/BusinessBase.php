<?php

namespace App\HttpController\Business;

use App\HttpController\Index;

class BusinessBase extends Index
{
    //继承这个主要是为了可以writeJson

    //也是为了onRequest
    public function onRequest(?string $action): ?bool
    {
        echo 'BusinessBase中的onRequest'.PHP_EOL;

        return parent::onRequest($action);
    }
}
