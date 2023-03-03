<?php

declare(strict_types=1);

namespace Framework\Controller\Security;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

final class AuthController extends AbstractController
{
    #[Route('/auth', name: 'GET_USER_INFO')]
    public function index(UserInterface $user): Response
    {
        return new JsonResponse($user->toArray());
    }
}
