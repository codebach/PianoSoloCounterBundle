<?php

namespace PianoSolo\CounterBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use PianoSolo\CounterBundle\Entity\Counter;

class CounterCreator
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!in_array('PianoSolo\CounterBundle\Traits\CounterTrait', class_uses($entity))) {
            return;
        }

        if (null == $entity->getCounter()) {
            $counter = new Counter();
            $entity->setCounter($counter);
        }
    }
}