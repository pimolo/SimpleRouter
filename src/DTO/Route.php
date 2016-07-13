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
     * @return array
     */
    public function getAllowedMethods()
    {
        return $this->allowedMethods;
    }

    /**
     * @return callable
     */
    public function getResource()
    {
        return $this->resource;
    }
}
