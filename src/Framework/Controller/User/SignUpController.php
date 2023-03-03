<?php

declare(strict_types=1);

namespace Framework\Controller\User;

use Application\Service\SignUpService;
use Application\UseCase\SignUpRequest;
use Framework\Form\SignUpForm;
use Framework\Response\Redirect;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignUpController extends AbstractController
{
    #[Route('/register', name: 'REGISTER_USER', methods: ['GET', 'POST'])]
    public function registerUser(Request $request, SignUpService $service): Response
    {
        $form = $this->createForm(SignUpForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $service->handle(new SignUpRequest($data['email'], $data['password']));

            return new Redirect('/login');
        }

        return $this->render('user/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
