<?php

namespace Events\Consumer;

use Events\Dispatcher\DispatcherInterface;
use Events\Formatter\DeserializerInterface;
use Events\Publisher\Buffer;
use Events\Publisher\PublisherInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMqConsumer implements ConsumerInterface
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
    private $queueName;

    /**
     * @var DispatcherInterface
     */
    private $dispatcher;

    /**
     * @var DeserializerInterface
     */
    private $deserializer;

    /**
     * @var Buffer
     */
    private $publisher;

    /**
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $pass
     * @param string $queueName
     * @param DispatcherInterface $dispatcher
     * @param DeserializerInterface $deserializer
     * @param Buffer $publisher
     */
    public function __construct(string $host, int $port, string $user, string $pass, string $queueName, DispatcherInterface $dispatcher, DeserializerInterface $deserializer, Buffer $publisher)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->queueName = $queueName;
        $this->dispatcher = $dispatcher;
        $this->deserializer = $deserializer;
        $this->publisher = $publisher;
    }


    public function consume(): void
    {
        $connection = new AMQPStreamConnection($this->host, $this->port, $this->user, $this->pass);
        $channel = $connection->channel();

        $channel->queue_declare($this->queueName, false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) use ($channel) {
            $this->dispatcher->dispatch($this->deserializer->deserialize($msg->body));
            $msg->ack();
            $this->publisher->flush();
            $channel->close();
        };

        $channel->basic_qos(null, 1, null);
        $channel->basic_consume($this->queueName, '', false, false, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }


}