<?php
namespace vendor\framework\Services\Base;
use vendor\framework\Services\Service;
use vendor\framework\Services\ServiceRule;
use vendor\framework\Framework as App;
class ConfigureService extends Service implements ServiceRule{

    protected $config;
    public function create()
    {
        
        include(ROOT_PATH.'/route/Route.php');
        include(CONFIG_PATH.'/database.php');
        $this->setConfig('route',$route);
        $this->setConfig('database',$db);

    }
    public function run()
    {

    }
    public function setConfig($name,$value)
    {
        $this->config[$name] = $value;
    }
    public function getConfig($configName)
    {
        return $this->config[$configName];
    }

}