<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use Hashids\Hashids;

class GetHashids extends ServerBase
{
    use Singleton;

    private $obj;

    private function __construct($salt=__DIR__,$minHashLength=8)
    {
        $this->obj=new Hashids($salt,$minHashLength);
    }

    public function getObj()
    {
        return $this->obj;
    }


}
