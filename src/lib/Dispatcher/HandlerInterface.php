<?php

namespace Events\Dispatcher;

use Events\MessageInterface;

interface HandlerInterface
{
    public function handle(MessageInterface $message): void;
}