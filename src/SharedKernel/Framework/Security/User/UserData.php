<?php

declare(strict_types=1);

namespace SharedKernel\Framework\Security\User;

use DateTimeImmutable;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Domain\Language;
use Symfony\Component\Uid\Uuid;

final class UserData
{
    public function __construct(
        private ?int $userId,
        private Uuid $userUuid,
        private Email $email,
        private PasswordHash $passwordHash,
        private Language $language,
        private DateTimeImmutable $createdAt,
        private DateTimeImmutable $updatedAt
    ) {
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getUserUuid(): Uuid
    {
        return $this->userUuid;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): PasswordHash
    {
        return $this->passwordHash;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
