<?php

declare(strict_types=1);

namespace SharedKernel\Framework\Security\Provider;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Domain\Exception\UserCannotBeFound;
use SharedKernel\Application\Query\User\GetUserByEmailQuery;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\Language;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Framework\Security\User\SharedUser;
use SharedKernel\Framework\Security\User\UserData;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Uid\Uuid;

final class UserByEmailProvider implements UserProviderInterface
{
    public function __construct(private Connection $connection)
    {
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $this->loadUserByIdentifier($user->getUserIdentifier());
    }

    public function supportsClass(string $class): bool
    {
        return $class === SharedUser::class;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = $this->connection->fetchAssociative((string) new GetUserByEmailQuery(), [$identifier]);

        if (empty($user)) {
            throw new UserCannotBeFound("User with email ({$identifier}) cannot be found");
        }

        $userData = new UserData(
            (int) $user['id'],
            Uuid::fromString($user['uuid']),
            new Email($user['email']),
            new PasswordHash($user['password']),
            new Language($user['language']),
            new DateTimeImmutable($user['created_at']),
            new DateTimeImmutable($user['updated_at']),
        );

        return new SharedUser($userData);
    }
}
