<?php

namespace Events\Publisher;

use Events\MessageInterface;

interface PublisherInterface
{
    public function publish(MessageInterface $message): void;
}