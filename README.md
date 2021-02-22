# SQPHP



這是一個練習用的PHP框架，起初是為了自己實現如何編寫依賴注入，並且受到Laravel的啟發，因此決定搞一個框架，也算是自己對於PHP學習的總結。



這個框架是開源的，任何人都可以使用，框架功能還在製作中，因為是悠閒性質，所以只有在有空的時候會繼續補強。

結至2021年初，先簡單實現MVC中的C功能。



# 定義路由

在route目錄下編輯Route.php，該檔案內容如下

```php
<?php
namespace route;

return  [
    ['url'=>'/','controller'=>'TestController','action'=>'index','method'=>'get'],
];

```

路由是由一個陣列組成，裡面需要給定四個屬性

- url
- controller
- action
- method

url屬性是restful的格式，代表資源的訪問路徑，例如：

```php
'url'=>'/controller/action'
```

controller是指要使用哪個控制器，控制器的位置須放置在runtime/controllers下

```php
'controller'=>'TestController'
```

action是指要使用controller下的哪個方法

```php
'action'=>'index'
```

所以，以上述控制器和url結合為例，該控制器應該如下(TestController)：

```php
<?php
namespace RunTime\controllers;
class TestController extends Controller
{
    public function index(Demo $demo)
    {
        //方法體
       
    }
    ...
}
```

如上方代碼所示，方法可以注入額外的實例，你不必去new一個實例，這是因為這個框架有使用依賴注入。