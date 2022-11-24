<?php

namespace Events\Formatter;

use Events\Message;
use Events\MessageInterface;
use JsonSchema\Validator;

class JsonDeserializer implements DeserializerInterface
{
    /**
     * @var Validator
     */
    private $schemaValidator;

    /**
     * @var String
     */
    private $schemaPath;

    public function __construct(string $schemaPath)
    {
        $this->schemaValidator = new Validator();
        $this->schemaPath = $schemaPath;
    }

    public function deserialize(string $message): MessageInterface
    {
        $jsonObject = json_decode($message, null, 512, JSON_THROW_ON_ERROR);
        $this->schemaValidator->validate($jsonObject, (object)['$ref' => 'file://' . realpath($this->schemaPath)]);
        if (!$this->schemaValidator->isValid()) {
            throw new \Exception();
        }

        return new Message($jsonObject->id, $jsonObject->name, (array)$jsonObject->payload, new \DateTime($jsonObject->occurredAt));
    }

}