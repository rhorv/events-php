<?php

namespace MyApp\Handler;

use Events\Dispatcher\HandlerInterface;
use Events\MessageInterface;
use Events\Publisher\PublisherInterface;
use MyApp\Event\AnotherEvent;
use MyApp\Event\TestEvent;

class TestHandler implements HandlerInterface
{
    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * @param PublisherInterface $publisher
     */
    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function handle(MessageInterface $message): void
    {
        /** @var TestEvent $testEvent */
        $testEvent = TestEvent::fromMessage($message);
        echo "Got it: ".$testEvent->getName();
        $this->publisher->publish(new AnotherEvent("thisthing"));
    }

}