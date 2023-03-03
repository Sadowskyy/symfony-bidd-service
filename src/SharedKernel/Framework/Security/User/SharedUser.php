<?php

declare(strict_types=1);

namespace SharedKernel\Framework\Security\User;

use JsonSerializable;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\Language;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class SharedUser implements UserInterface, PasswordAuthenticatedUserInterface, JsonSerializable
{
    public function __construct(private UserData $userData)
    {
    }

    public function getPassword(): string
    {
        return (string) $this->userData->getPasswordHash();
    }

    public function getEmail(): Email
    {
        return $this->userData->getEmail();
    }

    public function getLanguage(): Language
    {
        return $this->userData->getLanguage();
    }

    public function getRoles(): array
    {
        return [];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->userData->getEmail();
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->userData->getUserUuid()->jsonSerialize(),
            'email' => (string) $this->getEmail(),
            'password' => $this->getPassword(),
            'language' => (string) $this->getLanguage(),
            'created_at' => $this->userData->getCreatedAt()->format('Y-m-d H:i:s'),
            'updated_at' => $this->userData->getUpdatedAt()->format('Y-m-d H:i:s'),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
