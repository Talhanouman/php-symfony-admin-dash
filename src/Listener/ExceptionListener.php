<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class ExceptionListener implements EventSubscriberInterface
{
    /**
     * @var Environment
     */
    private $engine;

    public function __construct(Environment $engine)
    {
        $this->engine = $engine;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        // Get Exception
        $exception = $event->getThrowable();

        if ($exception instanceof NotFoundHttpException) {
            $event->setResponse(new Response($this->engine->render('Admin/_other/notFound.html.twig'), 404));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [['onKernelException']],
        ];
    }
}
