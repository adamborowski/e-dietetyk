<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produkty
 *
 * @ORM\Table(name="produkty", indexes={@ORM\Index(name="opis_prod_id", columns={"opis_prod_id"}), @ORM\Index(name="zamowienie_id", columns={"zamowienie_id"}), @ORM\Index(name="dieta_id", columns={"dieta_id"})})
 * @ORM\Entity
 */
class Produkty {
    /**
     * @var integer
     *
     * @ORM\Column(name="produkt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $produktId;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=20000, nullable=false)
     */
    private $data;

    /**
     * @var \OpisyProduktow
     *
     * @ORM\ManyToOne(targetEntity="OpisyProduktow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="opis_prod_id", referencedColumnName="opis_prod_id")
     * })
     */
    private $opisProd;

    /**
     * @var \Zamowienia
     *
     * @ORM\ManyToOne(targetEntity="Zamowienia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zamowienie_id", referencedColumnName="zamowienie_id")
     * })
     */
    private $zamowienie;

    /**
     * @var \Diety
     *
     * @ORM\ManyToOne(targetEntity="Diety")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dieta_id", referencedColumnName="dieta_id")
     * })
     */
    private $dieta;


    /**
     * Get produktId
     *
     * @return integer
     */
    public function getProduktId() {
        return $this->produktId;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Produkty
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
     * Set opisProd
     *
     * @param \Rzymek\DietBundle\Entity\OpisyProduktow $opisProd
     * @return Produkty
     */
    public function setOpisProd(\Rzymek\DietBundle\Entity\OpisyProduktow $opisProd = null) {
        $this->opisProd = $opisProd;

        return $this;
    }

    /**
     * Get opisProd
     *
     * @return \Rzymek\DietBundle\Entity\OpisyProduktow
     */
    public function getOpisProd() {
        return $this->opisProd;
    }

    /**
     * Set zamowienie
     *
     * @param \Rzymek\DietBundle\Entity\Zamowienia $zamowienie
     * @return Produkty
     */
    public function setZamowienie(\Rzymek\DietBundle\Entity\Zamowienia $zamowienie = null) {
        $this->zamowienie = $zamowienie;

        return $this;
    }

    /**
     * Get zamowienie
     *
     * @return \Rzymek\DietBundle\Entity\Zamowienia
     */
    public function getZamowienie() {
        return $this->zamowienie;
    }

    /**
     * Set dieta
     *
     * @param \Rzymek\DietBundle\Entity\Diety $dieta
     * @return Produkty
     */
    public function setDieta(\Rzymek\DietBundle\Entity\Diety $dieta = null) {
        $this->dieta = $dieta;

        return $this;
    }

    /**
     * Get dieta
     *
     * @return \Rzymek\DietBundle\Entity\Diety
     */
    public function getDieta() {
        return $this->dieta;
    }
}
