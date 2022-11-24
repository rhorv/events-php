<?php

namespace Events\Formatter;

use Events\MessageInterface;

interface DeserializerInterface
{
    public function deserialize(string $message): MessageInterface;
}