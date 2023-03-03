<?php

declare(strict_types=1);

namespace Infrastructure\Persistence\Doctrine\Orm;

use Doctrine\DBAL\Connection;
use Domain\WriteModel\Entity\User;
use Domain\WriteModel\UserRepository;

final class DoctrineUserRepository implements UserRepository
{
    private const TABLE = 'users';

    public function __construct(private Connection $connection)
    {
    }

    public function save(User $user): void
    {
        $this->connection->insert(self::TABLE, $user->toArray());
    }
}
