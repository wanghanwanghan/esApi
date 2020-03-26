<?php

namespace App\HttpController\Business\Test;

use App\HttpController\Business\BusinessBase;
use App\HttpController\Server\DataSource\Fahai;
use App\HttpController\Server\WriteLog;
use EasySwoole\DDL\Blueprint\Table;
use EasySwoole\DDL\DDLBuilder;
use EasySwoole\DDL\Enum\Character;
use EasySwoole\DDL\Enum\Engine;
use EasySwoole\Pool\Manager;

class TestController extends BusinessBase
{
    public function onRequest(?string $action): ?bool
    {
        parent::onRequest($action);

        return true;
    }

    public function afterAction(?string $actionName): void
    {
        parent::afterAction($actionName);
    }

    public function index()
    {
        $url='https://api.fahaicc.com/v2/query/sat?';

        $data=[
            'dataType'=>'satparty_qs',
            'keyword'=> '小米',
            'pageno'=>1,
            'range'=>10
        ];

        //$res=Fahai::getInstance()->send($url,$data);

        $res=['wanghan',$this->request()->getHeaders()];



        WriteLog::getInstance()->writeLog('段冉');





        $this->writeJson(200,$res,'suc');


        return true;
    }

    public function mysqlTest()
    {
        $sql=DDLBuilder::table('session',function (Table $table)
        {
            $table->setTableComment('共享session表')
                ->setTableEngine(Engine::MEMORY)
                ->setTableCharset(Character::UTF8MB4_GENERAL_CI);

            $table->colInt('id',11)->setColumnComment('主键')->setIsAutoIncrement()->setIsUnsigned()->setIsPrimaryKey();
            $table->colVarChar('sid')->setColumnLimit(50)->setIsNotNull()->setColumnComment('sessionID');
            $table->colVarChar('content')->setColumnLimit(255)->setDefaultValue('')->setColumnComment('sessionID');
            $table->colInt('updated_at',11)->setIsUnsigned()->setColumnComment('更新时间');
            $table->indexNormal('sid_index','sid');
        });

        try
        {
            $obj=Manager::getInstance()->get('project')->getObj();

            $obj->rawQuery($sql);

            Manager::getInstance()->get('project')->recycleObj($obj);

        }catch (\Throwable $e)
        {
            var_dump($e->getMessage());
        }

        $this->writeJson(200,'ok','success');

        return true;
    }


}
