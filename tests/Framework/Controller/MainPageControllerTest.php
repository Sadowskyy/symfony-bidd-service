<?php

declare(strict_types=1);

namespace Tests\Framework\Controller;

use Tests\Utils\AbstractFunctionalTestCase;

class MainPageControllerTest extends AbstractFunctionalTestCase
{
    public function testMainPageEndpoint(): void
    {
        $crawler = $this->getCrawler($this->getClient(), '/main');
        
        $this->assertResponseIsSuccessful();
    }
}