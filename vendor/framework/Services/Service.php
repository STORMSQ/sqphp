<?php
namespace vendor\framework\Services;
use vendor\framework\Container as App;

class Service{
    public $app;
    public function __construct(App $app)
    {
        $this->app = $app;
        
        if(is_callable([$this,'create'])){
            $this->create();
        }
        
    }

    
}
