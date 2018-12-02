<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/09/18
 * Time: 16:36.
 */

namespace App\Listener;

use App\Entity\Address;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

class AddressSerializerListener implements EventSubscriberInterface
{
    public function onPostSerialize(ObjectEvent $event)
    {
        /**
 * @var Address $object
*/
        $object = $event->getObject();
        $object->setDateAdd(new \DateTime());
        $object->setDateUpd(new \DateTime());
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
                'class' => 'App\Entity\Address',
                'method' => 'onPostSerialize',
            ],
        ];
    }
}
