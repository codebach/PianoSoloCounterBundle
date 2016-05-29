<?php

namespace PianoSolo\CounterBundle\Traits;

use PianoSolo\CounterBundle\Entity\Counter;
use Doctrine\ORM\Mapping as ORM;

trait CounterTrait
{
    /**
     * Counter.
     *
     * @ORM\OneToOne(
     *     targetEntity="PianoSolo\CounterBundle\Entity\Counter",
     *     cascade={"persist", "remove"},
     *     orphanRemoval=true
     * )
     */
    private $counter;

    /**
     * Set counter.
     *
     * @param Counter $counter
     *
     * @return $this
     */
    public function setCounter(Counter $counter = null)
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * Get counter.
     *
     * @return Counter
     */
    public function getCounter()
    {
        return $this->counter;
    }
}