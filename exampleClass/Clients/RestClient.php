<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/11
 * Time: 15:29
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Clients;

use ESD\Plugins\SaberCloud\Annotation\SaberClient;
use ESD\Plugins\SaberCloud\ExampleClass\Interfaces\IRestController;

/**
 * @SaberClient(host="http://127.0.0.1:8082",fallback=RestClientFallback::class)
 * Interface RestClient
 * @package ESD\Plugins\SaberCloud\ExampleClass\Clients
 */
interface RestClient extends IRestController
{

}