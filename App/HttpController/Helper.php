<?php

namespace App\HttpController;

use EasySwoole\Component\Singleton;

class Helper
{
    use Singleton;

    //随机字符串
    public function str_random($num=8)
    {
        $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

        $res='';

        for ($i=$num;$i--;)
        {
            $res.=substr($str,mt_rand(0,61),1);
        }

        return $res;
    }
}