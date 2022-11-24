<?php

namespace Events\Formatter;

use Events\MessageInterface;

class CompressionDeserializerDecorator implements DeserializerInterface
{
    /**
     * @var DeserializerInterface
     */
    private $deserializer;

    /**
     * @param DeserializerInterface $deserializer
     */
    public function __construct(DeserializerInterface $deserializer)
    {
        $this->deserializer = $deserializer;
    }

    public function deserialize(string $message): MessageInterface
    {
        return $this->deserializer->deserialize(gzdecode(base64_decode($message)));
    }


}