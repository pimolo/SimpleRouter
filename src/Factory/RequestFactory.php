<?php

namespace Pimolo\SimpleRouter\Factory;

use Pimolo\SimpleRouter\DTO\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class RequestFactory
{
    public static function create(HttpFoundationRequest $request)
    {
        return (new Request(
            $request->getUri(),
            $request->getMethod()
        ));
    }
}