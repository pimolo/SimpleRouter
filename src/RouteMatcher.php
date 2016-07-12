<?php

namespace Pimolo\SimpleRouter;

use Pimolo\SimpleRouter\DTO\Request;
use Pimolo\SimpleRouter\DTO\Route;
use Pimolo\SimpleRouter\Exception\NotFoundException;

class RouteMatcher
{
    /**
     * @param Request $request
     * @param Route[] $routes
     * @return Route
     * @throws NotFoundException
     */
    public function findRoute(Request $request, array $routes)
    {
        /** @var Route $route */
        foreach ($routes as $route) {
            if ($this->isMatching($request, $route)) {
                return $route;
            }
        }

        throw new NotFoundException($request);
    }

    /**
     * @param Request $request
     * @param Route $route
     * @return bool
     */
    public function isMatching(Request $request, Route $route)
    {
        return ($request->getUri() === $route->getUriPath() && in_array($request->getMethod(), $route->getAllowedMethods()));
    }
}
