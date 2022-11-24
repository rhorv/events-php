<?php

namespace Events\Formatter;

use Events\MessageInterface;

class CompressionSerializerDecorator implements SerializerInterface
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

    public function serialize(MessageInterface $message): string
    {
        $output = $this->serializer->serialize($message);
        return base64_encode(gzencode($output));
    }

}