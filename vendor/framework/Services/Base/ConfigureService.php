<?php
namespace vendor\framework\Services\Base;
use vendor\framework\Services\Service;
use vendor\framework\Framework as App;
class ConfigureService extends Service{

    protected $config;
    public function create()
    {
        $this->setConfig('route',include(ROOT_PATH.'/route/Route.php'));
        $this->setConfig('database',include(CONFIG_PATH.'/database.php'));

    }
    public function setConfig($name,$value)
    {
        $this->config[$name] = $value;
    }
    public function getConfig($configName)
    {
        return $this->config[$configName];
    }
    public function getAllConfig()
    {
        return $this->config;
    }

}