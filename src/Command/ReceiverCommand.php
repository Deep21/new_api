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

class ReceiverCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rabitmq:receiver';


    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('task_queue', false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function (AMQPMessage $msg) {
            dump(' [x] Received ', $msg->getBody());
            sleep(2);

            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_consume('task_queue', '', false, false, false, false, $callback);


        while (count($channel->callbacks)) {
            try {
                $channel->wait();
            } catch (\ErrorException $e) {
            }
        }

    }
}