<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;

class CreateDefind
{
    use Singleton;

    private $rootPath;

    private function img()
    {
        $dir=$this->rootPath.'img'.DIRECTORY_SEPARATOR;

        $this->createDir($dir);

        define('IMGPATH',$dir);
    }

    private function file()
    {
        $dir=$this->rootPath.'file'.DIRECTORY_SEPARATOR;

        $this->createDir($dir);

        define('FILEPATH',$dir);
    }

    private function video()
    {
        $dir=$this->rootPath.'video'.DIRECTORY_SEPARATOR;

        $this->createDir($dir);

        define('VIDEOPATH',$dir);
    }

    private function createDir($dir)
    {
        if (!is_dir($dir)) mkdir($dir,0777);
    }

    public function createDefind($rootPath)
    {
        $this->rootPath=$rootPath.DIRECTORY_SEPARATOR;

        //注册目录
        $this->img();
        $this->file();
        $this->video();

        return true;
    }





}
