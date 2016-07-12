<?php

namespace Pimolo\SimpleRouter\DTO;

class Route
{
    /**
     * @var string
     */
    private $uriPath;

    /**
     * @var array
     */
    private $allowedMethods;

    /**
     * @var callable
     */
    private $resource;

    /**
     * @param string $uriPath
     * @param array $allowedMethods
     * @param callable $resource
     */
    public function __construct($uriPath, array $allowedMethods, callable $resource)
    {
        $this->uriPath = $uriPath;
        $this->allowedMethods = $allowedMethods;
        $this->resource = $resource;
    }


    /**
     * @return string
     */
    public function getUriPath()
    {
        return $this->uriPath;
    }

    /**
     * @param $uriPath
     * @return $this
     */
    public function setUriPath($uriPath)
    {
        $this->uriPath = $uriPath;

        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }

    /**
     * @param array $allowedMethods
     * @return $this
     */
    public function setAllowedMethods(array $allowedMethods)
    {
        $this->allowedMethods = $allowedMethods;

        return $this;
    }

    /**
     * @return callable
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param callable $resource
     * @return $this
     */
    public function setResource(callable $resource)
    {
        $this->resource = $resource;

        return $this;
    }
}
