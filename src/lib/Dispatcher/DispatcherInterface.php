<?php

namespace Events\Dispatcher;

use Events\MessageInterface;

interface DispatcherInterface
{
    public function dispatch(MessageInterface $message): void;
}