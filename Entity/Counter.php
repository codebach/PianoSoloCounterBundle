<?php

namespace PianoSolo\CounterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Counter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PianoSolo\CounterBundle\Entity\CounterRepository")
 */
class Counter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="realCount", type="integer")
     */
    private $realCount = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="correctionCount", type="integer")
     */
    private $correctionCount = 0;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return Counter
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set realCount
     *
     * @param integer $realCount
     *
     * @return Counter
     */
    public function setRealCount($realCount)
    {
        $this->realCount = $realCount;

        return $this;
    }

    /**
     * Get realCount
     *
     * @return integer
     */
    public function getRealCount()
    {
        return $this->realCount;
    }

    /**
     * Set correctionCount
     *
     * @param integer $correctionCount
     *
     * @return Counter
     */
    public function setCorrectionCount($correctionCount)
    {
        $this->correctionCount = $correctionCount;

        return $this;
    }

    /**
     * Get correctionCount
     *
     * @return integer
     */
    public function getCorrectionCount()
    {
        return $this->correctionCount;
    }

    /**
     * Adds click
     *
     * @param int $clicks
     *
     * @return Counter
     */
    public function addClicks($clicks)
    {
        $newRealCount = $this->realCount + $clicks;

        $this->setRealCount($newRealCount);

        $this->count = $this->realCount + $this->correctionCount;

        return $this;
    }
}

