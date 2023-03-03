<?php

declare(strict_types=1);

namespace Application\Service;

use Application\UseCase\SignUpRequest;
use DateTimeImmutable;
use Domain\WriteModel\Entity\User;
use Domain\WriteModel\UserRepository;
use SharedKernel\Domain\Email;
use SharedKernel\Domain\Language;
use SharedKernel\Domain\PasswordHash;
use SharedKernel\Framework\Security\User\UserData;
use Symfony\Component\Uid\Uuid;

final class SignUpService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(SignUpRequest $request): void {
        $email = new Email($request->getEmail());
        $passwordHash = new PasswordHash(password_hash($request->getPassword(), PASSWORD_DEFAULT));
        $userData = new UserData(
            null,
            Uuid::v4(),
            $email,
            $passwordHash,
            new Language('en'),
            new DateTimeImmutable(),
            new DateTimeImmutable()
        );
        $user = new User($userData);

        $this->userRepository->save($user);
    }
}