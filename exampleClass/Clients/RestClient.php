<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/11
 * Time: 15:29
 */

namespace ESD\Plugins\SaberCloud\ExampleClass\Clients;

use ESD\Plugins\SaberCloud\Annotation\SaberClient;
use ESD\Plugins\SaberCloud\ExampleClass\Interfaces\IRestController;

/**
 * @SaberClient(host="localhost:8082")
 * Interface RestClient
 * @package ESD\Plugins\SaberCloud\ExampleClass\Clients
 */
interface RestClient extends IRestController
{

}