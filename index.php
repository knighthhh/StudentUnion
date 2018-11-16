<?php
//模式由生产模式变为开发模式
define("APP_DEBUG", true);
//定义前台CSS、JS、img的路径常量
//define('APP_PATH','/Application/index.php/Admin/index/index');

define("SITE_URL", "http://127.0.0.1:80");

define("CSS_URL", "/StudentUnion/Public/Home/css/");
define("IMAGES_URL", SITE_URL . "/StudentUnion/Public/Home/images/");
define("JS_URL", SITE_URL . "/StudentUnion/Public/Home/js/");

//定义后台界面CSS，image,js路径
define("ADMIN_CSS_URL", SITE_URL . "/StudentUnion/Public/Admin/css/");
define("ADMIN_IMAGES_URL", SITE_URL . "/StudentUnion/Public/Admin/images/");
define("ADMIN_JS_URL", SITE_URL . "/StudentUnion/Public/Admin/js/");

//layui文件路径
define("ADMIN_LAYUI_URL", SITE_URL . "/StudentUnion/Public/layui/");

require './ThinkPHP/ThinkPHP.php';
