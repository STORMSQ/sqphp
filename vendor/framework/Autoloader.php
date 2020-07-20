<?php
namespace vendor\framework;
class Autoloader{

    private static $loader;
    public function __construct()
    {
        spl_autoload_register([$this,'import'],true,true);
    }
    
    public function import($className)
    {
        
        
        $path = explode("\\",$className);
        $filePath =  ROOT_PATH . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $path) . '.php';
        if(is_file($filePath)){
            
            require $filePath;
            
        }
    }
    public static function init()
    {
        if (self::$loader===null) {
            self::$loader = new Autoloader();
        }
        return self::$loader;
    }
}