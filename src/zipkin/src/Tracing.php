<?php

namespace Mix\Zipkin;

/**
 * Class Tracing
 * @package Mix\Zipkin
 */
class Tracing
{

    /**
     * @var string
     */
    public $url = 'http://127.0.0.1:9411/api/v2/spans';

    /**
     * @var int
     */
    public $timeout = 5;

    /**
     * Trace
     * @param string $serviceName
     * @param null $ip
     * @param null $port
     * @return Tracer
     * @throws \PhpDocReader\AnnotationException
     * @throws \ReflectionException
     */
    public function trace(string $serviceName, $ip = null, $port = null)
    {
        $tracer = new Tracer([
            'url'         => $this->url,
            'timeout'     => $this->timeout,
            'serviceName' => $serviceName,
            'ipv4'        => strpos($ip, '.') !== false ? $ip : null,
            'ipv6'        => strpos($ip, ':') !== false ? $ip : null,
            'port'        => $port,
        ]);
        $tracer->init();
        return $tracer;
    }

}
