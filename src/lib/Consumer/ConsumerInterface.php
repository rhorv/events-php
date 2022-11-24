<?php

namespace Events\Consumer;

interface ConsumerInterface
{
    public function consume(): void;
}