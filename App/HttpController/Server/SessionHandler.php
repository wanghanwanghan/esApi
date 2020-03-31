<?php

namespace App\HttpController\Server;

use EasySwoole\RedisPool\Redis;

class SessionHandler implements \SessionHandlerInterface
{
    public function close()
    {
        return true;
    }

    public function destroy($session_id)
    {
        $obj=Redis::defer('redis');

        $obj->del($session_id);

        return true;
    }

    public function gc($maxlifetime)
    {
        //空实现
    }

    public function open($save_path,$name)
    {
        return true;
    }

    public function read($session_id)
    {
        $obj=Redis::defer('redis');

        $content=$obj->get($session_id);

        return $content;
    }

    public function write($session_id,$session_data)
    {
        $obj=Redis::defer('redis');

        $obj->set($session_id,$session_data);

        return true;
    }


}
