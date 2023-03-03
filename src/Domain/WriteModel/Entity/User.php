<?php

declare(strict_types=1);

namespace Domain\WriteModel\Entity;

use SharedKernel\Framework\Security\User\SharedUser;

class User extends SharedUser
{
    public function toArray(): array
    {
        return parent::toArray();
    }
}
