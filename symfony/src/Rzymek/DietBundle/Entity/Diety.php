<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diety
 *
 * @ORM\Table(name="diety", indexes={@ORM\Index(name="login", columns={"login"})})
 * @ORM\Entity
 */
class Diety {
    /**
     * @var integer
     *
     * @ORM\Column(name="dieta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dietaId;

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
     * Get dietaId
     *
     * @return integer
     */
    public function getDietaId() {
        return $this->dietaId;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Diety
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
     * @return Diety
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
