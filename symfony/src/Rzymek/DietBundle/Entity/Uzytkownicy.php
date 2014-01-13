<?php

namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uzytkownicy
 *
 * @ORM\Table(name="uzytkownicy")
 * @ORM\Entity
 */
class Uzytkownicy {
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=31, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=20000, nullable=false)
     */
    private $data;


    /**
     * Get login
     *
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Uzytkownicy
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Uzytkownicy
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
