<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/5/14
 * Time: 18:55
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Controllers;

use DI\Annotation\Inject;
use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PathVariable;
use ESD\Plugins\EasyRoute\Annotation\RequestParam;
use ESD\Plugins\EasyRoute\Annotation\RestController;
use ESD\Plugins\EasyRoute\Controller\EasyController;
use ESD\Plugins\SaberCloud\ExampleClass\Clients\RestClient;
use ESD\Plugins\SaberCloud\ExampleClass\Interfaces\IRestController;

/**
 * @RestController("test")
 * Class TestController
 * @package ESD\Plugins\EasyRoute
 */
class AnnRestController extends EasyController implements IRestController
{

    /**
     * @Inject()
     * @var RestClient
     */
    private $restClient;

    /**
     * 找不到方法时调用
     * @param $methodName
     * @return mixed
     */
    protected function defaultMethod(?string $methodName)
    {
        // TODO: Implement defaultMethod() method.
    }

    /**
     * get请求
     * @GetMapping("/")
     * @return string
     */
    public function hello()
    {
        return $this->restClient->hello();
    }

    /**
     * get请求
     * @GetMapping("test/{name}")
     * @PathVariable("name")
     * @RequestParam("id")
     * @param $name
     * @param $id
     * @return string
     */
    public function test($name, $id)
    {
        return $this->restClient->test($name, $id);
    }
}