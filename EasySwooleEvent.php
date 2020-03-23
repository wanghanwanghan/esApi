<?php
namespace EasySwoole\EasySwoole;

use App\Crontab\TestCrontab;
use App\HttpController\Server\CreateDefind;
use App\HttpController\Server\CreateMysqlPoolForLogDb;
use App\HttpController\Server\CreateMysqlPoolForProjectDb;
use App\HttpController\Server\CreateRedisPool;
use EasySwoole\EasySwoole\Crontab\Crontab;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class EasySwooleEvent implements Event
{

    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        //注册常量
        CreateDefind::getInstance()->createDefind(__DIR__);
        //注册redis连接池
        CreateRedisPool::getInstance()->createRedis();
        //注册mysql连接池
        CreateMysqlPoolForProjectDb::getInstance()->createMysql();
        CreateMysqlPoolForLogDb::getInstance()->createMysql();

        //定时任务
        Crontab::getInstance()->addTask(TestCrontab::class);



    }

    public static function onRequest(Request $request, Response $response): bool
    {
        echo 'es的onRequest'.PHP_EOL;
        return false;
    }

    public static function afterRequest(Request $request, Response $response): void
    {
        echo 'es的afterRequest'.PHP_EOL;
    }
}