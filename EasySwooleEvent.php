<?php
namespace EasySwoole\EasySwoole;

use App\HttpController\Server\CreateDefind;
use App\HttpController\Server\CreateMysqlPool;
use App\HttpController\Server\CreateRedisPool;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use EasySwoole\Pool\Manager;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        //注册常量
        CreateDefind::getInstance()->createDefind();
        //注册redis连接池
        CreateRedisPool::getInstance()->createRedis();
        //注册mysql连接池
        CreateMysqlPool::getInstance()->createMysql();
    }

    public static function onRequest(Request $request, Response $response): bool
    {
        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {

    }
}