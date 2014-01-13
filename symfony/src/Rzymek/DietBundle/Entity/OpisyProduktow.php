<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpisyProduktow
 *
 * @ORM\Table(name="opisy_produktow", indexes={@ORM\Index(name="posrednik_id", columns={"posrednik_id"})})
 * @ORM\Entity
 */
class OpisyProduktow {
    /**
     * @var integer
     *
     * @ORM\Column(name="opis_prod_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $opisProdId;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=20000, nullable=false)
     */
    private $data;

    /**
     * @var \Posrednicy
     *
     * @ORM\ManyToOne(targetEntity="Posrednicy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="posrednik_id", referencedColumnName="posrednik_id")
     * })
     */
    private $posrednik;


    /**
     * Get opisProdId
     *
     * @return integer
     */
    public function getOpisProdId() {
        return $this->opisProdId;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return OpisyProduktow
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

    /**
     * Set posrednik
     *
     * @param \Rzymek\DietBundle\Entity\Posrednicy $posrednik
     * @return OpisyProduktow
     */
    public function setPosrednik(\Rzymek\DietBundle\Entity\Posrednicy $posrednik = null) {
        $this->posrednik = $posrednik;

        return $this;
    }

    /**
     * Get posrednik
     *
     * @return \Rzymek\DietBundle\Entity\Posrednicy
     */
    public function getPosrednik() {
        return $this->posrednik;
    }
}
