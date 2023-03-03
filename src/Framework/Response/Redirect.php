<?php

declare(strict_types=1);

namespace Framework\Response;

use Symfony\Component\HttpFoundation\RedirectResponse;

final class Redirect extends RedirectResponse
{
    public function __construct(string $url, array $headers = [])
    {
        parent::__construct($url, 302, $headers);
    }
}
