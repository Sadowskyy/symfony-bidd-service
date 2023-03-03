<?php

declare(strict_types=1);

namespace SharedKernel\Application\Query\User;

final class GetUserByEmailQuery
{
    public function __toString(): string
    {
        return $this->getSQL();
    }

    public function getSQL(): string
    {
        return <<<CODE_SAMPLE
SELECT *
FROM users
WHERE email = ?
CODE_SAMPLE;
    }
}
