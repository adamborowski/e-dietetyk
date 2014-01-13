<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zamowienia
 *
 * @ORM\Table(name="zamowienia", indexes={@ORM\Index(name="login", columns={"login"})})
 * @ORM\Entity
 */
class Zamowienia {
    /**
     * @var integer
     *
     * @ORM\Column(name="zamowienie_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $zamowienieId;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=20000, nullable=false)
     */
    private $data;

    /**
     * @var \Uzytkownicy
     *
     * @ORM\ManyToOne(targetEntity="Uzytkownicy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login", referencedColumnName="login")
     * })
     */
    private $login;


    /**
     * Get zamowienieId
     *
     * @return integer
     */
    public function getZamowienieId() {
        return $this->zamowienieId;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Zamowienia
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
     * Set login
     *
     * @param \Rzymek\DietBundle\Entity\Uzytkownicy $login
     * @return Zamowienia
     */
    public function setLogin(\Rzymek\DietBundle\Entity\Uzytkownicy $login = null) {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return \Rzymek\DietBundle\Entity\Uzytkownicy
     */
    public function getLogin() {
        return $this->login;
    }
}
