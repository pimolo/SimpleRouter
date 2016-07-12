<?php

namespace Pimolo\SimpleRouter;

use Pimolo\SimpleRouter\Factory\RequestFactory;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    /**
     * Execute the resource defined in the route corresponding to the request.
     * @param Request $baseRequest
     * @param $definedRoutes
     * @return callable
     * @throws Exception\NotFoundException
     */
    public function route(Request $baseRequest, array $definedRoutes)
    {
        $factory = new RequestFactory();
        $request = $factory::create($baseRequest);
        $routeMatcher = new RouteMatcher();
        $route = $routeMatcher->findRoute($request, $definedRoutes);

        return $this->executeResource($route->getResource());
    }

    private function executeResource(callable $resource)
    {
        return $resource();
    }
}
