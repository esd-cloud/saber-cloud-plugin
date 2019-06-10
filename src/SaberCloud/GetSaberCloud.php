<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/10
 * Time: 17:44
 */

namespace ESD\Plugins\SaberCloud;


use Swlib\Saber;

trait GetSaberCloud
{
    /**
     * @var SaberCloud
     */
    protected $saberCloud;

    /**
     * @param string $service
     * @return Saber|null
     * @throws CloudException
     */
    public function getSaber(string $service): ?Saber
    {
        if ($this->saberCloud == null) {
            $this->saberCloud = DIGet(SaberCloud::class);
        }
        return $this->saberCloud->getSaber($service);
    }

    /**
     * @param string $service
     * @param array $options
     */
    public function setSaberOptions(string $service, $options = [])
    {
        if ($this->saberCloud == null) {
            $this->saberCloud = DIGet(SaberCloud::class);
        }
        $this->saberCloud->setSaberOptions($service, $options);
    }

}