<?php
namespace Framework;

define("FRAMEWORK_PATH",__DIR__);
define("ROOT_PATH",FRAMEWORK_PATH.'/../../..');
define("CONFIG_PATH",ROOT_PATH.'/config');
define("CONTROLLER_PATH",ROOT_PATH.'/app/controllers');
define("SERVICES_PATH",FRAMEWORK_PATH.'/Services');
//Autoloader::init();
require "Helper.php";
$framework = new Framework();
$framework->run();
