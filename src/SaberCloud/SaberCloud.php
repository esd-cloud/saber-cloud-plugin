<?php
/**
 * Created by PhpStorm.
 * User: administrato
 * Date: 2019/6/10
 * Time: 15:09
 */

namespace ESD\Plugins\SaberCloud;


use DI\Annotation\Inject;
use ESD\Psr\Cloud\Services;
use Swlib\Saber;

class SaberCloud
{
    /**
     * @Inject()
     * @var Services
     */
    protected $services;

    /**
     * @var Saber[]
     */
    protected $sabers;

    /**
     * @var array
     */
    protected $options;

    public function setSaberOptions(string $service, $options = [])
    {
        $this->options[$service] = $options;
    }

    /**
     * @param string $service
     * @return Saber
     * @throws CloudException
     */
    public function getSaber(string $service)
    {
        $serviceInfo = $this->services->getService($service);
        if ($serviceInfo == null) throw new CloudException("Do not find service $service");
        $baseUri = $serviceInfo->getServiceAgreement() . "://" . $serviceInfo->getServiceAddress() . ":" . $serviceInfo->getServicePort();
        $saber = $this->sabers[$baseUri] ?? null;
        if ($saber == null) {
            $normalOptions = [
                'exception_report' => 0,
                'base_uri' => $baseUri,
                'retry_time' => 3,
                'retry' => function (Saber\Request $request) {
                    $request->getUri()->withHost();
                }
            ];
            $options = $this->options[$service] ?? null;
            if ($options != null) {
                $finalOptions = array_merge($normalOptions, $options);
            } else {
                $finalOptions = $normalOptions;
            }
            $saber = Saber::create($finalOptions);
            $this->sabers[$baseUri] = $saber;
        }
        return $saber;
    }
}