<?php

declare(strict_types=1);

namespace Tests\Framework\Controller;

use Doctrine\DBAL\Driver\Connection;
use SharedKernel\Application\Query\User\GetUserByEmailQuery;
use Tests\Utils\AbstractFunctionalTestCase;

class AuthControllerTest extends AbstractFunctionalTestCase
{
    public function testMainPageEndpoint(): void
    {
        /**@var Connection $connection */
        $connection = static::getContainer()->get(Connection::class);

        $user = $connection->exec("SELECT * FROM users WHERE email = 'admin@symfony.dev'");
        dd($user);
    }
}
