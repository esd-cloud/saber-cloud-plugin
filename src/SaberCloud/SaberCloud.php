<?php
/**
 * Created by PhpStorm.
 * User: 白猫
 * Date: 2019/6/10
 * Time: 15:09
 */

namespace ESD\Plugins\SaberCloud;


use DI\Annotation\Inject;
use ESD\Core\Plugins\Logger\GetLogger;
use ESD\Psr\Cloud\Services;
use Swlib\Saber;

class SaberCloud
{
    use GetLogger;
    /**
     * @var Services
     */
    protected $services;

    /**
     * @Inject()
     * @var SaberCloudConfig
     */
    protected $config;

    /**
     * @var Saber[]
     */
    protected $sabers;

    /**
     * @var array
     */
    protected $options;

    public function __construct()
    {
        try {
            $this->services = DIGet(Services::class);
        }catch (\Throwable $e){
            $this->warn("没有使用服务发现，通过服务名获取url将不可用");
        }
    }

    public function setSaberOptions(string $service, $options = [])
    {
        $this->options[$service] = $options;
    }

    public function getSaberFromBaseUrl(string $baseUri): ?Saber
    {
        $saber = $this->sabers[$baseUri] ?? null;
        if ($saber == null) {
            $normalOptions = [
                'exception_report' => 0,
                'use_pool' => true,
                'base_uri' => $baseUri,
                'retry_time' => $this->config->getRetryTime(),
                'retry' => function (Saber\Request $request) use ($baseUri) {
                    $request->getUri()->withHost($baseUri);
                }
            ];
            $finalOptions = $normalOptions;
            $saber = Saber::create($finalOptions);
            $this->sabers[$baseUri] = $saber;
        }
        return $saber;
    }

    /**
     * @param string $service
     * @return Saber
     * @throws CloudException
     */
    public function getSaber(string $service): ?Saber
    {
        $baseUri = $this->getBaseUrl($service);
        $saber = $this->sabers[$baseUri] ?? null;
        if ($saber == null) {
            $normalOptions = [
                'exception_report' => 0,
                'use_pool' => true,
                'base_uri' => $baseUri,
                'retry_time' => $this->config->getRetryTime(),
                'retry' => function (Saber\Request $request) use ($service) {
                    $baseUri = $this->getBaseUrl($service);
                    $request->getUri()->withHost($baseUri);
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

    /**
     * @param $service
     * @return string
     * @throws CloudException
     */
    private function getBaseUrl($service)
    {
        $serviceInfo = $this->services->getService($service);
        if ($serviceInfo == null) throw new CloudException("Do not find service $service");
        return $serviceInfo->getServiceAgreement() . "://" . $serviceInfo->getServiceAddress() . ":" . $serviceInfo->getServicePort();
    }
}