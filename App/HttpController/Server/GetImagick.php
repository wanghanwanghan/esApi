<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use Intervention\Image\ImageManager;

class GetImagick extends ServerBase
{
    use Singleton;

    private $obj;

    private $driver='imagick';

    private function __construct()
    {
        if (!extension_loaded('imagick')) $this->driver='gd';

        $this->obj=new ImageManager([
            'driver'=>$this->driver
        ]);
    }

    public function getObj()
    {
        return $this->obj;
    }

}
