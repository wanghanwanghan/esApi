<?php

namespace App\HttpController\Server;

use Intervention\Image\ImageManager;

class GetImagick extends ServerBase
{
    private $obj;

    private $driver='imagick';

    public function __construct()
    {
        $this->obj=new ImageManager([
            'driver'=>$this->driver
        ]);
    }

    public function getObj()
    {
        return $this->obj;
    }

}
