<?php
namespace Framework\Services;
use Framework\Container as App;

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
