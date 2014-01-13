<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posrednicy
 *
 * @ORM\Table(name="posrednicy")
 * @ORM\Entity
 */
class Posrednicy {
    /**
     * @var integer
     *
     * @ORM\Column(name="posrednik_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $posrednikId;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=20000, nullable=false)
     */
    private $data;


    /**
     * Get posrednikId
     *
     * @return integer
     */
    public function getPosrednikId() {
        return $this->posrednikId;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Posrednicy
     */
    public function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData() {
        return $this->data;
    }
}
