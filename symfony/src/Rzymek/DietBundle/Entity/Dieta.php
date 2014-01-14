<?php
namespace Rzymek\DietBundle\Entity;

class Dieta {
    protected $id;
    protected $userLogin;
    protected $cel;
    protected $liczbaPosilkow;
    protected $aktywnosci;

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $cel
     */
    public function setCel($cel) {
        $this->cel = $cel;
    }

    /**
     * @return mixed
     */
    public function getCel() {
        return $this->cel;
    }

    /**
     * @param mixed $aktywnosci
     */
    public function setAktywnosci($aktywnosci) {
        $this->aktywnosci = $aktywnosci;
    }

    /**
     * @return mixed
     */
    public function getAktywnosci() {
        return $this->aktywnosci;
    }

    /**
     * @param mixed $liczbaPosilkow
     */
    public function setLiczbaPosilkow($liczbaPosilkow) {
        $this->liczbaPosilkow = $liczbaPosilkow;
    }

    /**
     * @return mixed
     */
    public function getLiczbaPosilkow() {
        return $this->liczbaPosilkow;
    }

    /**
     * @param mixed $userLogin
     */
    public function setUserLogin($userLogin) {
        $this->userLogin = $userLogin;
    }

    /**
     * @return mixed
     */
    public function getUserLogin() {
        return $this->userLogin;
    }


    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);

        $this->setId($stdObj->id);
        $this->setUserLogin($stdObj->userLogin);
        $this->setCel($stdObj->cel);
        $this->setLiczbaPosilkow($stdObj->liczbaPosilkow);
        $this->setAktywnosci($stdObj->aktywnosci);
    }
}
