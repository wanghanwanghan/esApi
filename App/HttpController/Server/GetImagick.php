<?php

namespace App\HttpController\Server;

use Intervention\Image\ImageManager;

class GetImagick extends ServerBase
{
    public $obj;

    public function __construct()
    {
        $this->obj=new ImageManager(['driver'=>'imagick']);
    }

    public function getObj()
    {
        return $this->obj;
    }

}
