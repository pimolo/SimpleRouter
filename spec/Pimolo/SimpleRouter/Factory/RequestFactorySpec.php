<?php

namespace spec\Pimolo\SimpleRouter\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class RequestFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Pimolo\SimpleRouter\Factory\RequestFactory');
    }

    function it_should_transform_httpfoundation_requests_to_custom_request_objects(HttpFoundationRequest $request)
    {
        $request->getPathInfo()->willReturn(Argument::type('string'));
        $request->getMethod()->willReturn(Argument::type('string'));

        $this::createFromHttpFoundation($request)->shouldReturnAnInstanceOf('Pimolo\SimpleRouter\DTO\Request');;
    }
}
