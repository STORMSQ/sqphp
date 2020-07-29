<?php
namespace vendor\framework;
use vendor\framework\Services\Http\HttpService;
use vendor\framework\Services\Base\ConfigureService;
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
        $parser = $this->getInstance('url')->parseURL();
        $this->getInstance('http')->run($parser);
    }


}