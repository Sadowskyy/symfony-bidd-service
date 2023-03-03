<?php
declare(strict_types=1);

namespace Tests\SharedKernel\Framework\Security\User;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\Language;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Framework\Security\User\SharedUser;
use SharedKernel\Framework\Security\User\UserData;
use Symfony\Component\Uid\Uuid;

class SharedUserTest extends TestCase
{
    public function testCreatingSharedUser(): void
    {
        $userData = new UserData(
            1,  
            Uuid::v4(),
            new Email('email@gmail.com'),
            new PasswordHash('123'),
            new Language('en'),
            new DateTimeImmutable(),
            new DateTimeImmutable() 
        );
        $user = new SharedUser($userData);
        self::assertEquals('123', $user->getPassword());
        self::assertEquals('email@gmail.com', $user->getUserIdentifier());
        self::assertEquals([], $user->getRoles());
    }
}