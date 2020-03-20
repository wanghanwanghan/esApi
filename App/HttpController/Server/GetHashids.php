<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use Hashids\Hashids;

class GetHashids extends ServerBase
{
    use Singleton;

    private $obj;

    private function __construct()
    {
        $this->obj=new Hashids();
    }

    public function getObj()
    {
        return $this->obj;
    }


}
