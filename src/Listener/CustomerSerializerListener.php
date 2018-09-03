<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/09/18
 * Time: 16:36.
 */

namespace App\Listener;

use App\Entity\Customer;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class CustomerSerializerListener implements EventSubscriberInterface
{
    public function onPostSerialize(ObjectEvent $event)
    {
        /**
 * @var Customer $object 
*/
        $object = $event->getObject();
        $object->setUpdatedAt(new \DateTime());
        $object->setCreatedAt(new \DateTime());

        if (!$object->getAddress()->isEmpty()) {
            foreach ($object->getAddress() as $address) {
                $address->setDateAdd(new \DateTime());
                $address->setDateUpd(new \DateTime());
            }
        }
    }

    /**
     * Returns the events to which this class has subscribed.
     *
     * Return format:
     *     array(
     *         array('event' => 'the-event-name', 'method' => 'onEventName', 'class' => 'some-class', 'format' => 'json'),
     *         array(...),
     *     )
     *
     * The class may be omitted if the class wants to subscribe to events of all classes.
     * Same goes for the format key.
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => Events::POST_DESERIALIZE,
                'format' => 'json',
                'class' => 'App\Entity\Customer',
                'method' => 'onPostSerialize',
            ],
        ];
    }
}
