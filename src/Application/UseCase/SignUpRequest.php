<?php

declare(strict_types=1);

namespace Application\UseCase;

final class SignUpRequest
{
    public function __construct(private string $email, private string $password)
    {
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
