<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;

class CreateDefind
{
    use Singleton;

    private $rootPath;

    private function img()
    {

    }

    private function file()
    {

    }

    private function video()
    {

    }

    public function createDefind($rootPath)
    {
        $this->rootPath=$rootPath;

        var_dump($rootPath);

        $this->img();
        $this->file();
        $this->video();

        return true;
    }





}
