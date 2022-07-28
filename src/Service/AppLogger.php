<?php

namespace App\Service;

use think\facade\Log;

class AppLogger
{
    const TYPE_LOG4PHP  = 'log4php';

    private $logger;
    private $msg;

    public function __construct($type = self::TYPE_LOG4PHP,$msg="")
    {

        switch ($type){
            case 'think-log':
                $msg = strtoupper($msg);
                $config = $this->getConfig();
                Log::init($config);
                $this->logger = Log::channel('');
                break;
            default:
                $this->logger = \Logger::getLogger("Log");
                break;
        }
        $this->msg = $msg;


        /*if ($type == self::TYPE_LOG4PHP) {
            \Logger::configure($config);
            $this->logger = \Logger::getLogger("Log");
        }*/


    }

    //获取配置
    public function getConfig(){
        return [
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	        =>	'file',
                    'path'	        =>	'./logs/',
                ],
            ]
        ];
    }

    /*public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }*/
    public function info()
    {
        $this->logger->info($this->msg);
    }
    public function debug()
    {
        $this->logger->debug($this->msg);
    }
    public function error()
    {
        $this->logger->error($this->msg);
    }
}