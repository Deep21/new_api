<?php
namespace App\Command;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Created by PhpStorm.
 * User: deep
 * Date: 30/12/18
 * Time: 20:53
 */

class PublisherCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rabitmq:publish';


    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $connection = new AMQPStreamConnection("rabbitmq", "5672", 'test', 'test');
        $channel = $connection->channel();
        $channel->queue_declare('task_queue', false, true, false, false);

        for ($i=0; $i<20; $i++){
            $message = new AMQPMessage("Hello", array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
            $channel->basic_publish($message, '', 'hello');
        }

        dump('[x] Sent Hello World!');

        $channel->close();
        $connection->close();
    }
}