<?php

namespace Events;

class Message implements MessageInterface
{

    /**
     * @var String
     */
    private $id;

    /**
     * @var String
     */
    private $name;

    /**
     * @var array
     */
    private $payload;

    /**
     * @var \DateTimeInterface
     */
    private $occurredAt;

    /**
     * @param String $id
     * @param String $name
     * @param array $payload
     * @param \DateTimeInterface $occurredAt
     */
    public function __construct(string $id, string $name, array $payload, \DateTimeInterface $occurredAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->payload = $payload;
        $this->occurredAt = $occurredAt;
    }

    /**
     * @return String
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getOccurredAt(): \DateTimeInterface
    {
        return $this->occurredAt;
    }


}