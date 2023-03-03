<?php

declare(strict_types=1);

namespace SharedKernel\Domain;

use Domain\Exception\InvalidEmailException;
use JsonSerializable;

final class Email implements JsonSerializable
{
    private string $address;

    public function __construct(string $address)
    {
        $address = trim($address, " \t\n\r\0\x0B`");
        $this->address = $address;

        if (! filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("{$address} is not a valid email");
        }
    }

    public function __toString(): string
    {
        return $this->address;
    }

    public function jsonSerialize(): string
    {
        return $this->address;
    }
}
