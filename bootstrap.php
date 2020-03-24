<?php

//如注册命令行支持、全局通用函数等功能

function storage_path($directory)
{
    $dir=__DIR__.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR;

    if (trim($directory)!='')
    {
        $dir.=$directory.DIRECTORY_SEPARATOR;

        if (!is_dir($dir)) mkdir($dir,0777);
    }

    return $dir;
}
