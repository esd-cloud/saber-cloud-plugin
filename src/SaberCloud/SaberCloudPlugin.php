<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/10
 * Time: 15:06
 */

namespace ESD\Plugins\SaberCloud;


use ESD\Core\Context\Context;
use ESD\Core\PlugIn\AbstractPlugin;

class SaberCloudPlugin extends AbstractPlugin
{

    /**
     * @var SaberCloudConfig|null
     */
    private $saberCloudConfig;

    /**
     * SaberCloudPlugin constructor.
     * @param SaberCloudConfig|null $saberCloudConfig
     * @throws \ReflectionException
     */
    public function __construct(?SaberCloudConfig $saberCloudConfig = null)
    {
        parent::__construct();
        if($saberCloudConfig==null){
            $saberCloudConfig = new SaberCloudConfig();
        }
        $this->saberCloudConfig = $saberCloudConfig;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "SaberCloudPlugin";
    }

    /**
     * 初始化
     * @param Context $context
     * @throws \ESD\Core\Plugins\Config\ConfigException
     */
    public function beforeServerStart(Context $context)
    {
        $this->saberCloudConfig->merge();
        return;
    }

    /**
     * 在进程启动前
     * @param Context $context
     * @return mixed
     */
    public function beforeProcessStart(Context $context)
    {
        $this->ready();
    }
}