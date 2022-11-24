<?php

namespace Events\Publisher;

use Events\Formatter\SerializerInterface;
use Events\MessageInterface;

class StdOutPublisher implements PublisherInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function publish(MessageInterface $message): void
    {
        echo $this->serializer->serialize($message);
    }

}