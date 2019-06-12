<?php

use ESD\Plugins\Aop\AopPlugin;
use ESD\Plugins\CircuitBreaker\CircuitBreakerPlugin;
use ESD\Plugins\EasyRoute\EasyRoutePlugin;
use ESD\Plugins\SaberCloud\SaberCloudPlugin;
use ESD\Server\Co\ExampleClass\DefaultServer;

require __DIR__ . '/../vendor/autoload.php';

define("ROOT_DIR", __DIR__ . "/..");
define("RES_DIR", __DIR__ . "/resources");
$server = new DefaultServer(null);
$server->getPlugManager()->addPlug(new AopPlugin());
$server->getPlugManager()->addPlug(new EasyRoutePlugin());
$server->getPlugManager()->addPlug(new SaberCloudPlugin());
$server->getPlugManager()->addPlug(new CircuitBreakerPlugin());
//配置
$server->configure();
//启动
$server->start();
