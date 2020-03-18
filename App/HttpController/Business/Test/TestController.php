<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Helper;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;
use EasySwoole\Pool\Manager;
use EasySwoole\RedisPool\Redis;

class TestController extends BusinessBase
{
    public function index()
    {
        $request=$this->request()->getRequestParam();



        go(function ()
        {
            $sql = DDLBuilder::table('user', function (Table $table) {

                $table->setTableComment('用户表')//设置表名称/
                ->setTableEngine(Engine::INNODB)//设置表引擎
                ->setTableCharset(Character::UTF8MB4_GENERAL_CI);//设置表字符集
                $table->colInt('user_id', 10)->setColumnComment('用户ID')->setIsAutoIncrement()->setIsPrimaryKey();
                $table->colVarChar('username')->setColumnLimit(30)->setIsNotNull()->setColumnComment('用户名');
                $table->colChar('sex', 1)->setIsNotNull()->setDefaultValue(1)->setColumnComment('性别：1男，2女');
                $table->colTinyInt('age')->setIsUnsigned()->setColumnComment('年龄')->setIsNotNull();
                $table->colInt('created_at', 10)->setIsNotNull()->setColumnComment('创建时间');
                $table->colInt('updated_at', 10)->setIsNotNull()->setColumnComment('更新时间');
                $table->indexUnique('username_index', 'username');//设置索引
            });

            var_dump($sql);


            $mysql=Manager::getInstance()->get('mysql')->getObj();

            Manager::getInstance()->get('mysql')->recycleObj($mysql);
        });






        $this->writeJson(200,Helper::getInstance()->str_random(),'success');

        return true;
    }

    public function redisTest()
    {
        for ($i=1000;$i--;)
        {
            go(function ()
            {
                $obj=Redis::defer('redis');

                $obj->select(mt_rand(0,7));

                $obj->set(Helper::getInstance()->str_random(),Helper::getInstance()->str_random());
            });
        }

        return true;
    }
}
