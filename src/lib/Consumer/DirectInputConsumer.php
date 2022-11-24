<?php

namespace Events\Consumer;

use Events\Dispatcher\DispatcherInterface;
use Events\Formatter\DeserializerInterface;
use Events\Message;
use Events\MessageInterface;
use Events\Publisher\Buffer;

class DirectInputConsumer implements ConsumerInterface
{
    /**
     * @var DeserializerInterface
     */
    private $deserializer;

    /**
     * @var DispatcherInterface
     */
    private $dispatcher;

    /**
     * @var string
     */
    private $message;

    /**
     * @var Buffer
     */
    private $buffer;

    /**
     * @param DeserializerInterface $deserializer
     * @param DispatcherInterface $dispatcher
     * @param Buffer $buffer
     */
    public function __construct(DeserializerInterface $deserializer, DispatcherInterface $dispatcher, Buffer $buffer)
    {
        $this->deserializer = $deserializer;
        $this->dispatcher = $dispatcher;
        $this->buffer = $buffer;
    }


    public function messageToConsume(string $message): void
    {
        $this->message = $message;
    }

    public function consume(): void
    {
        $this->dispatcher->dispatch($this->deserializer->deserialize($this->message));
        // ack
        $this->buffer->flush();
    }


}