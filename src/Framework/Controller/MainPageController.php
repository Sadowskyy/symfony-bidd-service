<?php

declare(strict_types=1);

namespace Framework\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    #[Route('/main', name: 'MAIN_PAGE')]
    public function index(): Response
    {
        return $this->render('main/main.html.twig', [
        ]);
    }
}
