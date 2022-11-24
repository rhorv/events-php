<?php

namespace Events;

interface MessageInterface
{
    public function getName(): string;
    public function getPayload(): array;
    public function getOccurredAt(): \DateTimeInterface;
    public function getId(): string;
}