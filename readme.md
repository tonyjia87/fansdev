#fans dev environment with Laravel 5.5
建立一个Restful Api 模板

### 统一代码风格

为了保证我们的代码风格一致，以避免引起不必要的歧义. 在进行团队协作开发时,安装一个叫 EditorConfig 的插件.

应用的根目录下添加 .editorconfig 文件.

.editorconfig

```
# coding styles between different editors and IDEs
# editorconfig.org

root = true

[*]

# Change these settings to your own preference
indent_style = space
indent_size = 4

# We recommend you to keep these unchanged
end_of_line = lf
charset = utf-8
trim_trailing_whitespace = true
insert_final_newline = false

[*.{js,html,blade.php,css,scss}]
indent_style = space
indent_size = 4

[*.md]
trim_trailing_whitespace = false

```

### 时区

config/app.php
```angular2html
'timezone' => 'Asia/Shanghai',

```

### 辅助函数
有时候我们也需要创建自己的辅助函数，自定义辅助函数将会存放于 bootstrap/helpers.php 文件中

```
 touch bootstrap/helpers.php
 
```
在 bootstrap/app.php 文件的最顶部进行加载

bootstrap/app.php
```php
<?php

require __DIR__ . '/helpers.php';
```

### 跨域中间件

运行Artisan 命令 make:middleware 创建新的中间件：
```shell
php artisan make:middleware  Cors
```
该命令将会在 app/Http/Middleware 目录内新建一个 Cors 类，http header 包加上跨域属性
```php
<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
    }
}

``` 
参考 http://www.restapitutorial.com/lessons/httpmethods.html

注册中间件，只需在 app/Http/Kernel.php 类中的 $middleware 属性里列出这个中间件类 

```PHP
    protected $middleware = [
        ....
        ....
        ....
        \App\Http\Middleware\Cors::class,
    ];
```
参考 https://d.laravel-china.org/docs/5.5/middleware


### 
