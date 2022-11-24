<?php

namespace Events\Formatter;

use Events\MessageInterface;

interface SerializerInterface
{
    public function serialize(MessageInterface $message): string;
}