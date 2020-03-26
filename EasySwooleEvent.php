<?php
namespace EasySwoole\EasySwoole;

use App\Crontab\TestCrontab;
use App\HttpController\Server\CreateDefind;
use App\HttpController\Server\CreateMysqlPoolForLogDb;
use App\HttpController\Server\CreateMysqlPoolForProjectDb;
use App\HttpController\Server\CreateRedisPool;
use App\HttpController\Server\SessionHandler;
use EasySwoole\EasySwoole\Crontab\Crontab;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use EasySwoole\Session\Session;
use EasySwoole\Session\SessionFileHandler;

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


        //可以自己实现一个标准的session handler
        //$handler=new SessionFileHandler(EASYSWOOLE_TEMP_DIR);
        $handler=new SessionHandler();
        //表示cookie name   还有save path
        Session::getInstance($handler,'easy_session','../session');



    }

    public static function onRequest(Request $request, Response $response): bool
    {
        $cookie=$request->getCookieParams('easy_session');

        if(empty($cookie))
        {
            $sid=Session::getInstance()->sessionId();
            $response->setCookie('easy_session',$sid);
        }else
        {
            Session::getInstance()->sessionId($cookie);
        }

        return true;
    }

    public static function afterRequest(Request $request, Response $response): void
    {

    }
}