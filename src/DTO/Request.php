<?php

namespace Pimolo\SimpleRouter\DTO;


class Request
{
    private $uri;

    private $method;

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @param string $uri
     * @param string $method
     */
    public function __construct($uri = null, $method = null)
    {
        $this->uri = $uri;
        $this->method = $method;
    }
}
