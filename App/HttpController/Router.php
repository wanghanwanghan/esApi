<?php

namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\AbstractRouter;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{
    public function initialize(RouteCollector $routeCollector)
    {
        //全局模式拦截下,路由将只匹配Router.php中的控制器方法响应,将不会执行框架的默认解析
        $this->setGlobalMode(true);

        //测试路由
        $this->routeInTest($routeCollector);






    }

    //测试路由
    private function routeInTest(RouteCollector $routeCollector)
    {
        $routeCollector->addRoute(['GET','POST'],'/test','/Business/Test/TestController/index');
        $routeCollector->addRoute(['GET','POST'],'/mysqltest','/Business/Test/TestController/mysqlTest');
        $routeCollector->addRoute(['GET','POST'],'/sessiontest','/Business/Test/TestController/sessionTest');
        $routeCollector->addRoute(['GET','POST'],'/ut','/Business/Test/TestController/unixTimeParse');


        return true;
    }
}
