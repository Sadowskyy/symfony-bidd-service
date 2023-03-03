<?php

declare(strict_types=1);

namespace Framework\Controller\Health;

use Doctrine\DBAL\Connection;
use Framework\Response\EmptyResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HealthzController extends AbstractController
{
    #[Route('/healthz', name: 'CHECK_DATABASE_CONNECTION', methods: ['GET'])]
    public function connectToDatabase(Connection $connection): Response
    {
        $connection->fetchOne('SELECT 1');

        return new EmptyResponse();
    }
}
