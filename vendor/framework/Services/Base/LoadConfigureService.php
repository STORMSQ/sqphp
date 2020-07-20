<?php
namespace vendor\framework\Services\Base;
use vendor\framework\Services\Service;
use vendor\framework\Framework as App;
class LoadConfigureService extends Service{

    private $config;

    public function run()
    {
       $this->getRouteList(); 
       $this->getDatabaseConfig();

    }
    public function getRouteList()
    {
        include(ROOT_PATH.'/route/Route.php');

        $this->setConfig('route',$route);
    }
    public function getDatabaseConfig()
    {
        include(CONFIG_PATH.'/database.php');
        $this->setConfig('database',$db);
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