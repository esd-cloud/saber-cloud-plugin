<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/10
 * Time: 15:06
 */

namespace ESD\Plugins\SaberCloud;


use ESD\Core\Context\Context;
use ESD\Core\PlugIn\AbstractPlugin;

class SaberCloudPlugin extends AbstractPlugin
{

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
     */
    public function beforeServerStart(Context $context)
    {
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