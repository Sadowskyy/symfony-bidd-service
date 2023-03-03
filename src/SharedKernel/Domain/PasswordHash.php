<?php

declare(strict_types=1);

namespace SharedKernel\Domain;

use InvalidArgumentException;

final class PasswordHash
{
    private string $passwordHash;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Password hash cannot be empty!');
        }

        $this->passwordHash = $value;
    }

    public function __toString(): string
    {
        return $this->passwordHash;
    }

    public function jsonSerialize(): string
    {
        return $this->passwordHash;
    }
}
