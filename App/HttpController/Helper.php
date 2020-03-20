<?php

namespace App\HttpController;

use EasySwoole\Component\Singleton;

class Helper
{
    use Singleton;

    //和随机有关的函数重新播种
    private function mtsrand()
    {
        return mt_srand();
    }

    //随机字符串
    public function str_random($num=8)
    {
        $this->mtsrand();

        $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

        $res='';

        for ($i=$num;$i--;)
        {
            $res.=substr($str,mt_rand(0,61),1);
        }

        return $res;
    }

    //生成32位随机字符串
    public function randomUUID()
    {
        $this->mtsrand();

        return md5(uniqid(mt_rand(),true));
    }
}