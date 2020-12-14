<?php
namespace Framework\Services\Base;
use Framework\Services\Service;
use Framework\Framework as App;
class ConfigureService extends Service{

    protected $config;
    public function create()
    {
        $dir = scandir(CONFIG_PATH);
        
        foreach ($dir as $value){
            if(($value != '.' || $value != '..') && (false !== $pos = strripos($value, '.'))){
                if(substr($value, $pos+1, strlen($value))=='php'){
                    $fileName = substr($value, 0, $pos);
                    $this->setConfig($fileName,include(CONFIG_PATH.'/'.$value));
                }
            }
            
        }
        $this->setConfig('route',include(ROOT_PATH.'/route/Route.php'));
    }
    public function setConfig($name,$value)
    {
        $this->config[$name] = $value;
    }
    public function getConfig($configName)
    {
        if(!isset($this->config[$configName])){
            throw new \Exception("找不到設定檔");
        }
        return $this->config[$configName];
    }
    public function getAllConfig()
    {
        return $this->config;
    }

}