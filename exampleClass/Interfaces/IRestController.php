<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/11
 * Time: 16:48
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Interfaces;

use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\PathVariable;
use ESD\Plugins\EasyRoute\Annotation\RequestMapping;
use ESD\Plugins\EasyRoute\Annotation\RequestParam;

/**
 * @RequestMapping("test")
 * Interface IRestController
 */
interface IRestController
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