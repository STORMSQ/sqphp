<?php
namespace Framework;
use Framework\Container;
class Framework extends Container{

    /**
     * 初始化註冊所有列表中的預設服務
     */
    public function __construct()
    {
        $ServicesList = require(SERVICES_PATH.'/ServiceList.php');
        foreach($ServicesList as $name=>$service){
             $this->set($name, new $service($this));
        }      
    }
    /**
     * 執行框架運作邏輯
     *
     * @return void
     */
    public function run()
    {
        $this->getInstance('http')->run($this->getInstance('url')->parseURL());
    }


}