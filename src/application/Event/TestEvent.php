<?php

namespace MyApp\Event;

use Events\MessageInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TestEvent implements MessageInterface
{
    const NAME = "test_happened";

    /**
     * @var string
     */
    private $field1;

    /**
     * @var string
     */
    private $field2;

    /**
     * @var \DateTimeInterface
     */
    private $occurredAt;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $id;

    /**
     * @param string $something
     */
    public function __construct(string $field1, string $field2, UuidInterface $id = null, \DateTimeInterface $occurredAt = null)
    {
        $this->field1 = $field1;
        $this->field2 = $field2;
        if (is_null($id)) $this->id = Uuid::uuid4();
        if (is_null($occurredAt)) $this->occurredAt = new \DateTime('now');
    }

    public static function fromMessage(MessageInterface $message)
    {
        if (self::NAME != $message->getName()) {
            throw new Exception();
        }
        if (!array_key_exists( 'field1', $message->getPayload()) || !array_key_exists('field2', $message->getPayload())) {
            throw new Exception();
        }
        return new static($message->getPayload()['field1'], $message->getPayload()['field2'], Uuid::fromString($message->getId()), $message->getOccurredAt());
    }

    /**
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     * @return string
     */
    public function getField2(): string
    {
        return $this->field2;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getPayload(): array
    {
        return [
            'field1' => $this->field1,
            'field2' => $this->field2
        ];
    }

    public function getOccurredAt(): \DateTimeInterface
    {
        return $this->occurredAt;
    }

    public function getId(): string
    {
        return $this->id->toString();
    }

}