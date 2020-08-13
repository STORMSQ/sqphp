<?php
use Framework\Container;

function D(){

    echo 'D 功能';
}

function dd($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die;
}
function dump($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}
function app($applicationName)
{
    $container = Container::getContainer();
    return $container->get($applicationName);

}
function config($configName)
{
    return app(Framework\Services\Base\ConfigureService::class)->getConfig($configName);
}
function db()
{
    
}