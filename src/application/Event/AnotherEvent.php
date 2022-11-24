<?php

namespace MyApp\Event;

use Events\MessageInterface;
use Ramsey\Uuid\Uuid;

class AnotherEvent implements MessageInterface
{
    const NAME = "another_thing_happened";
    /**
     * @var string
     */
    private $something;

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
    public function __construct(string $something)
    {
        $this->something = $something;
        $this->id = Uuid::uuid4();
        $this->occurredAt = new \DateTime('now');
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getPayload(): array
    {
        return [
            'something' => $this->something
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