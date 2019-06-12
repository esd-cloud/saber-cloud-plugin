<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/12
 * Time: 9:54
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Clients;


use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PathVariable;
use ESD\Plugins\EasyRoute\Annotation\RequestParam;

class RestClientFallback implements RestClient
{

    /**
     * get请求
     * @GetMapping("/")
     * @return string
     */
    public function hello()
    {
        return "hello";
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
        return "test";
    }
}