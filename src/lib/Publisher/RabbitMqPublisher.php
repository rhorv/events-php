<?php

namespace Events\Publisher;

use Events\Formatter\SerializerInterface;
use Events\MessageInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqPublisher implements PublisherInterface
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $exchangeName;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $pass
     * @param string $queueName
     * @param SerializerInterface $serializer
     */
    public function __construct(string $host, int $port, string $user, string $pass, string $exchangeName, SerializerInterface $serializer)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->exchangeName = $exchangeName;
        $this->serializer = $serializer;
    }

    public function publish(MessageInterface $message): void
    {
        //file_put_contents("/tmp/message64", $this->serializer->serialize($message));die();

        $connection = new AMQPStreamConnection($this->host, $this->port, $this->user, $this->pass);
        $channel = $connection->channel();
        $channel->exchange_declare($this->exchangeName, 'fanout', false, true, false);

        $msg = new AMQPMessage($this->serializer->serialize($message));

        $channel->basic_publish($msg, $this->exchangeName);

        echo ' [x] Sent "\n"';

        $channel->close();
        $connection->close();
    }

}