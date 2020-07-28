<?php
namespace route;

return  [
    ['url'=>'/','controller'=>'TestController','action'=>'index','method'=>'get'],
    ['url'=>'/controller/action','controller'=>'TestController','action'=>'index','method'=>'get'],
    ['url'=>'/controller/action/do','controller'=>'TestController','action'=>'action','method'=>'post'],
];

        
