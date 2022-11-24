<?php

namespace Events\Publisher;

use Events\MessageInterface;

class Buffer implements PublisherInterface
{
    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * @var array
     */
    private $buffer;

    /**
     * @param PublisherInterface $publisher
     */
    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function publish(MessageInterface $message): void
    {
        $this->buffer[] = $message;
    }

    public function flush()
    {
        /** @var MessageInterface $item */
        foreach ($this->buffer as $index => $item) {
            $this->publisher->publish($item);
            unset($this->buffer[$index]);
        }
    }

}