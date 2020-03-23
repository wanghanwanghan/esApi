<?php

namespace App\Crontab;

use Carbon\Carbon;
use EasySwoole\EasySwoole\Crontab\AbstractCronTask;
use EasySwoole\EasySwoole\Task\TaskManager;

class TestCrontab extends AbstractCronTask
{
    public static function getRule(): string
    {
        return '* * * * *';
    }

    public static function getTaskName(): string
    {
        return 'TestCrontab';
    }

    public function run(int $taskId, int $workerIndex)
    {
        //同步任务
        echo "同步任务:".Carbon::now()->format('Y-m-d').PHP_EOL;

        TaskManager::getInstance()->async(function ()
        {
            //异步任务
            echo "异步任务:".Carbon::now()->timestamp.PHP_EOL;
        });
    }

    public function onException(\Throwable $throwable, int $taskId, int $workerIndex)
    {
        echo $throwable->getMessage();
    }
}
