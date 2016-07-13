<?php

namespace Pimolo\SimpleRouter\DTO;

class Request
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $method;

    /**
     * @param string $uri
     * @param string $method
     */
    public function __construct($method, $uri)
    {
        $this->uri = $uri;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
