<?php

declare(strict_types=1);

namespace Framework\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class EmptyResponse extends JsonResponse
{
    public function __construct()
    {
        parent::__construct([], Response::HTTP_NO_CONTENT, [], false);
    }
}
