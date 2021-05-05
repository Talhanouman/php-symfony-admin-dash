<?php

namespace App\Listener;

use App\Service\ConfigBag;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class LocaleListener implements EventSubscriberInterface
{
    /**
     * @var ConfigBag
     */
    private $bag;

    public function __construct(ConfigBag $bag)
    {
        $this->bag = $bag;
    }

    public function setDefaultLocale(KernelEvent $event): void
    {
        $event->getRequest()->setDefaultLocale($this->bag->get('default_locale'));
    }

    public static function getSubscribedEvents()
    {
        return [KernelEvents::REQUEST => [['setDefaultLocale', 99]]];
    }
}
