<?php

namespace spec\Pimolo\SimpleRouter;

use PhpSpec\ObjectBehavior;
use Pimolo\SimpleRouter\DTO\Request;
use Pimolo\SimpleRouter\DTO\Route;
use Prophecy\Argument;

class RouteMatcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Pimolo\SimpleRouter\RouteMatcher');
    }

    function it_checks_matching_between_corresponding_route_and_request(Request $request, Route $route)
    {
        $request->getUri()->willReturn('/home');
        $request->getMethod()->willReturn('GET');

        $route->getUriPath()->willReturn('/home');
        $route->getAllowedMethods()->willReturn(['GET']);

        $this->isMatching($request, $route)->shouldReturn(true);
    }

    function it_checks_matching_between_different_route_and_request(Request $request, Route $route)
    {
        $request->getUri()->willReturn('/login');
        $request->getMethod()->willReturn('GET');

        $route->getUriPath()->willReturn('/home');
        $route->getAllowedMethods()->willReturn(['POST']);

        $this->isMatching($request, $route)->shouldReturn(false);
    }

    function it_should_find_a_route(Request $request, Route $route1, Route $route2, Route $route3)
    {
        $request->getUri()->willReturn('/login');
        $request->getMethod()->willReturn('POST');

        $route1->getUriPath()->willReturn('/home');
        $route1->getAllowedMethods()->willReturn(['GET']);
        $route2->getUriPath()->willReturn('/login');
        $route2->getAllowedMethods()->willReturn(['POST']);
        $route3->getUriPath()->willReturn('/logout');
        $route3->getAllowedMethods()->willReturn(['POST']);


        $routeList = [$route1, $route2, $route3];

        $this->findRoute($request, $routeList)->shouldReturn($route2);
    }

    function it_should_not_find_a_route_because_of_wrong_uri(Request $request, Route $route1, Route $route2, Route $route3)
    {
        $request->getUri()->willReturn('/fake');
        $request->getMethod()->willReturn(Argument::type('string'));

        $route1->getUriPath()->willReturn('/home');
        $route1->getAllowedMethods()->willReturn(['GET']);
        $route2->getUriPath()->willReturn('/login');
        $route2->getAllowedMethods()->willReturn(['POST']);
        $route3->getUriPath()->willReturn('/logout');
        $route3->getAllowedMethods()->willReturn(['POST']);

        $routeList = [$route1, $route2, $route3];

        $this->shouldThrow('Pimolo\SimpleRouter\Exception\NotFoundException')->duringFindRoute($request, $routeList);
    }

    function it_should_not_find_a_route_because_of_wrong_method(Request $request, Route $route1, Route $route2, Route $route3)
    {
        $request->getUri()->willReturn('/home');
        $request->getMethod()->willReturn('POST');

        $route1->getUriPath()->willReturn('/home');
        $route1->getAllowedMethods()->willReturn(['GET']);
        $route2->getUriPath()->willReturn('/login');
        $route2->getAllowedMethods()->willReturn(['POST']);
        $route3->getUriPath()->willReturn('/logout');
        $route3->getAllowedMethods()->willReturn(['POST']);

        $routeList = [$route1, $route2, $route3];

        $this->shouldThrow('Pimolo\SimpleRouter\Exception\NotFoundException')->duringFindRoute($request, $routeList);
    }
}
