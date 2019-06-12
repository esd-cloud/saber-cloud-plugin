<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/11
 * Time: 12:16
 */

namespace ESD\Plugins\SaberCloud\Annotation;


use ESD\Plugins\AnnotationsScan\Annotation\Component;

/**
 * @Annotation
 * @Target("CLASS")
 * Class SaberClient
 * @package ESD\Plugins\SaberCloud\Annotation
 */
class SaberClient extends Component
{
    /**
     * 服务名称
     * @var string
     */
    public $value;
    /**
     * 没有服务名称，可以填host
     * @var string
     */
    public $host;
    /**
     * 失败调用的类
     * @var string
     */
    public $fallback;

    /**
     * 404s是否应该解码而不是抛出异常
     * @var bool
     */
    public $decode404 = false;
}