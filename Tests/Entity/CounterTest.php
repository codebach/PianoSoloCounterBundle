<?php

namespace PianoSolo\CounterBundle\Tests\Entity;

use PianoSolo\CounterBundle\Entity\Counter;

class CounterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddClick()
    {
        $counter = new Counter();
        $counter->addClick(1000);

        $this->assertSame(1000, $counter->getCount());
    }
}
