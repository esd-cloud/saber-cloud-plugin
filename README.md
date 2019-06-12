# saber-cloud-plugin
使用saber进行微服务访问，声明试web服务客户端

通过接口描述web客户端行为，服务提供方和调用方共用接口，服务提供方实现接口。

接口描述
```
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
```

服务提供方AnnRestController
```
/**
 * @RestController()
 * Class TestController
 * @package ESD\Plugins\EasyRoute
 */
class AnnRestController extends EasyController implements IRestController
{

    /**
     * 找不到方法时调用
     * @param $methodName
     * @return mixed
     */
    protected function defaultMethod(?string $methodName)
    {
        // TODO: Implement defaultMethod() method.
    }

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
        return "hello"
    }
}
```

客户端RestClient
```
/**
 * @SaberClient(host="http://127.0.0.1:8082",fallback=RestClientFallback::class)
 * Interface RestClient
 * @package ESD\Plugins\SaberCloud\ExampleClass\Clients
 */
interface RestClient extends IRestController
{

}
```

客户端降级结果RestClientFallback
```
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
```
使用客户端
```
    /**
     * @Inject()
     * @var RestClient
     */
    private $restClient;
    
     /**
     * get请求
     * @GetMapping("/")
     * @return string
     */
    public function hello()
    {
        return $this->restClient->hello();
    }
```
