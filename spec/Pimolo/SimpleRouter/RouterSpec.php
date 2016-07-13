<?php

namespace spec\Pimolo\SimpleRouter;

use PhpSpec\ObjectBehavior;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Pimolo\SimpleRouter\DTO\Request;
use Pimolo\SimpleRouter\DTO\Route;
use Prophecy\Argument;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Pimolo\SimpleRouter\Router');
    }

    function it_should_execute_a_resource_of_a_route(Route $route, HttpFoundationRequest $httpFoundationRequest, Request $request)
    {
        $httpFoundationRequest->getPathInfo()->willReturn('/home');
        $httpFoundationRequest->getMethod()->willReturn('GET');

        $request->getUri()->willReturn('/home');
        $request->getMethod()->willReturn('GET');

        $route->getUriPath()->willReturn('/home');
        $route->getAllowedMethods()->willReturn(['GET']);

        $route->getResource()->willReturn(function () {
            return 'foo bar';
        });

        $this->route($httpFoundationRequest, [$route])->shouldReturn('foo bar');
    }
}
