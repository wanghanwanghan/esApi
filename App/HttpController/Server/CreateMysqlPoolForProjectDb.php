<?php

namespace App\HttpController\Server;

use EasySwoole\Component\Singleton;
use EasySwoole\Mysqli\Client;
use EasySwoole\Mysqli\Config;
use EasySwoole\Pool\AbstractPool;
use EasySwoole\Pool\Manager;

class CreateMysqlPoolForProjectDb extends AbstractPool
{
    use Singleton;

    protected $mysqlConf;

    protected $database='project';

    public function __construct()
    {
        parent::__construct(new \EasySwoole\Pool\Config());

        $mysqlConf = new Config([
            'host'     => '47.106.169.68',
            'port'     => 63306,
            'user'     => 'chinaiiss',
            'password' => 'zbxlbj@2018*()',
            'database' => $this->database,
            'timeout'  => 5,
            'charset'  => 'utf8mb4',
        ]);

        $this->mysqlConf = $mysqlConf;
    }

    protected function createObject()
    {
        return new Client($this->mysqlConf);
    }

    //注册redis连接池，只能在mainServerCreate中用
    public function createMysql()
    {
        Manager::getInstance()->register(CreateMysqlPoolForProjectDb::getInstance(),$this->database);

        return true;
    }
}
