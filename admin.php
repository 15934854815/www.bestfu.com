<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 开启调试模式
define('APP_DEBUG', true);
define('BIND_MODULE', 'admin');
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';

/*关闭路由，和application/route.php注释内容配合使用*/
/*require __DIR__ . '/thinkphp/base.php';

\think\Route::bind('admin');

\think\App::route(false);

\think\App::run()->send();*/