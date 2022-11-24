<?php

namespace Events\Formatter;

use Events\MessageInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerializer implements SerializerInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param Serializer $serializer
     */
    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function serialize(MessageInterface $message): string
    {
        $dateCallback = function ($innerObject, $outerObject, string $attributeName, string $format = null, array $context = []) {
            return $innerObject instanceof \DateTime ? $innerObject->format(\DateTime::ISO8601) : '';
        };

        return $this->serializer->serialize($message, "json",   [
            AbstractNormalizer::ATTRIBUTES => ['id', 'name', 'payload', 'occurredAt'],
            AbstractNormalizer::CALLBACKS => ['occurredAt' => $dateCallback]
        ]);
    }

}