<?php

namespace Pimolo\SimpleRouter;

use Pimolo\SimpleRouter\Factory\RequestFactory;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    /**
     * Execute the resource defined in the route corresponding to the request.
     *
     * @param Request $baseRequest
     * @param array $definedRoutes
     * @return callable
     * @throws Exception\NotFoundException
     */
    public function route(Request $baseRequest, array $definedRoutes)
    {
        $request = RequestFactory::createFromHttpFoundation($baseRequest);

        $routeMatcher = new RouteMatcher();
        $route = $routeMatcher->findRoute($request, $definedRoutes);

        return $this->executeResource($route->getResource());
    }

    /**
     * This private method exists because maybe later, exception handlers could be added here
     * (or something else wrapping the execution of the callable).
     *
     * @param callable $resource
     * @return mixed
     */
    private function executeResource(callable $resource)
    {
        return $resource();
    }
}
