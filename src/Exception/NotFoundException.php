<?php

namespace Pimolo\SimpleRouter\Exception;

use Pimolo\SimpleRouter\DTO\Request;

class NotFoundException extends \Exception
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
