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
     * @var mixed
     */
    private $resource;

    /**
     * @param string $uriPath
     * @param array $allowedMethods
     * @param mixed $resource
     */
    public function __construct($uriPath, array $allowedMethods, $resource = null)
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
     * @param string $uriPath
     */
    public function setUriPath($uriPath)
    {
        $this->uriPath = $uriPath;
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
     */
    public function setAllowedMethods(array $allowedMethods)
    {
        $this->allowedMethods = $allowedMethods;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }
}
