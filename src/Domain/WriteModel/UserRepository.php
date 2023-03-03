<?php

declare(strict_types=1);

namespace Domain\WriteModel;

use Domain\WriteModel\Entity\User;

interface UserRepository
{
    public function save(User $user): void;
}
