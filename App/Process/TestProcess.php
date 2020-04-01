<?php

namespace App\Process;

use Carbon\Carbon;
use EasySwoole\Component\Process\AbstractProcess;

class TestProcess extends AbstractProcess
{
    protected function run($arg)
    {
        //当进程启动后，会执行的回调
        while (true)
        {
            var_dump('自定义进程: '.$this->getProcessName().' 运行，时间: '.Carbon::now()->format('Y-m-d H:i:s'));

            sleep(30);
        }
    }

    protected function onPipeReadable(\Swoole\Process $process)
    {
        /*
         * 该回调可选
         * 当有主进程对子进程发送消息的时候，会触发的回调，触发后，务必使用
         * $process->read()来读取消息
         */
    }

    protected function onShutDown()
    {
        /*
         * 该回调可选
         * 当该进程退出的时候，会执行该回调
         */
    }

    protected function onException(\Throwable $throwable, ...$args)
    {
        /*
         * 该回调可选
         * 当该进程出现异常的时候，会执行该回调
         */
    }
}