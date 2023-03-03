<?php

declare(strict_types=1);

namespace Framework;

use Framework\Response\ErrorResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

final class ExceptionSubscriber
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();
        $request = $event->getRequest();

        if ($this->hasAcceptableContentType($request)) {
            $response = $this->createApiResponse($throwable);
            $event->setResponse($response);
        }
    }

    private function createApiResponse(Throwable $throwable): Response
    {
        //Framework exceptions
        if ($throwable instanceof NotFoundHttpException) {
            return new JsonResponse(
                [
                    'error' => [
                        'code' => 'FR-01',
                        'message' => 'Cannot find specified route',
                    ],
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        $this->logger->error($throwable->getMessage(), [
            'exception' => $throwable,
        ]);

        return new ErrorResponse(
            "Unexpected error occurred! Error message: + {$throwable->getMessage()}",
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    private function hasAcceptableContentType(Request $request): bool
    {
        return in_array('application/json', $request->getAcceptableContentTypes(), true) ||
            in_array('*/*', $request->getAcceptableContentTypes(), true);
    }
}
