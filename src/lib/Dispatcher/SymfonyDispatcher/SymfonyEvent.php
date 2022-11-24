<?php

namespace Events\Dispatcher\SymfonyDispatcher;

use Events\Message;
use Events\MessageInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class SymfonyEvent extends GenericEvent implements MessageInterface
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
        parent::__construct($name, $payload);
        $this->id = $id;
        $this->name = $name;
        $this->payload = $payload;
        $this->occurredAt = $occurredAt;
    }

    public static function fromMessage(MessageInterface $message)
    {
        return new static($message->getId(), $message->getName(), $message->getPayload(), $message->getOccurredAt());
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