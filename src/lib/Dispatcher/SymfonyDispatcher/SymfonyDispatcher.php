<?php

namespace Events\Dispatcher\SymfonyDispatcher;

use Events\Dispatcher\DispatcherInterface;
use Events\MessageInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class SymfonyDispatcher implements DispatcherInterface
{
    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch(MessageInterface $message): void
    {
        $this->dispatcher->dispatch(SymfonyEvent::fromMessage($message), $message->getName());
    }

}