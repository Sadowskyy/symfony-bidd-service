<?php
declare(strict_types=1);

namespace Tests\Framework\Controller;

use Tests\Utils\AbstractFunctionalTestCase;

class HealthzControllerTest extends AbstractFunctionalTestCase
{
    public function testHealthzEndpoint(): void
    {
        self::jsonRequest($this->getClient(), 'GET', '/healthz');
        self::assertResponseIsSuccessful();
    }
}
