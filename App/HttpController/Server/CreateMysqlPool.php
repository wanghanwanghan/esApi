<?php

namespace App\HttpController\Server;

use EasySwoole\Mysqli\Client;
use EasySwoole\Mysqli\Config;
use EasySwoole\Pool\AbstractPool;

class CreateMysqlPool extends AbstractPool
{
    protected $mysqlConf;

    public function __construct()
    {
        $config = new \EasySwoole\Pool\Config();

        parent::__construct($config);

        $mysqlConf = new Config([
            'host'     => '47.106.169.68',
            'port'     => 63306,
            'user'     => 'chinaiiss',
            'password' => 'zbxlbj@2018*()',
            'database' => 'project',
            'timeout'  => 5,
            'charset'  => 'utf8mb4',
        ]);

        $this->mysqlConf = $mysqlConf;
    }

    protected function createObject()
    {
        $obj=new Client($this->mysqlConf);
        return $obj;
    }
}
