<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/11
 * Time: 15:29
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Clients;

use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PathVariable;
use ESD\Plugins\EasyRoute\Annotation\RequestMapping;
use ESD\Plugins\EasyRoute\Annotation\RequestParam;
use ESD\Plugins\SaberCloud\Annotation\SaberClient;

/**
 * @SaberClient("demo1")
 * @RequestMapping("user")
 * Interface AnnRestClient
 * @package ESD\Plugins\SaberCloud\ExampleClass\Clients
 */
interface AnnRestClient
{
    /**
     * get请求
     * @GetMapping("/")
     * @return string
     */
    public function hello();

    /**
     * get请求
     * @GetMapping("test/{name}")
     * @PathVariable("name")
     * @RequestParam("id")
     * @param $name
     * @param $id
     * @return string
     */
    public function test($name, $id);
}