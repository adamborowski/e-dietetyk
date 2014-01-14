<?php
namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Zamowienie {
    protected $id;
    protected $userLogin;
    protected $dataZlozeniaZamowienia;
    protected $dataPlatnosci; // za zamówienie
    protected $czyPotwierdzone;
    protected $czyWyslane;
    protected $kosztTransportu;
    protected $lacznaCena;
    protected $lacznaProwizja;

    /**
     * @param mixed $czyPotwierdzone
     */
    public function setCzyPotwierdzone($czyPotwierdzone) {
        $this->czyPotwierdzone = $czyPotwierdzone;
    }

    /**
     * @return mixed
     */
    public function getCzyPotwierdzone() {
        return $this->czyPotwierdzone;
    }

    /**
     * @param mixed $czyWyslane
     */
    public function setCzyWyslane($czyWyslane) {
        $this->czyWyslane = $czyWyslane;
    }

    /**
     * @return mixed
     */
    public function getCzyWyslane() {
        return $this->czyWyslane;
    }

    /**
     * @param mixed $dataPlatnosci
     */
    public function setDataPlatnosci($dataPlatnosci) {
        $this->dataPlatnosci = $dataPlatnosci;
    }

    /**
     * @return mixed
     */
    public function getDataPlatnosci() {
        return $this->dataPlatnosci;
    }

    /**
     * @param mixed $dataZlozeniaZamowienia
     */
    public function setDataZlozeniaZamowienia($dataZlozeniaZamowienia) {
        $this->dataZlozeniaZamowienia = $dataZlozeniaZamowienia;
    }

    /**
     * @return mixed
     */
    public function getDataZlozeniaZamowienia() {
        return $this->dataZlozeniaZamowienia;
    }

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
     * @param mixed $kosztTransportu
     */
    public function setKosztTransportu($kosztTransportu) {
        $this->kosztTransportu = $kosztTransportu;
    }

    /**
     * @return mixed
     */
    public function getKosztTransportu() {
        return $this->kosztTransportu;
    }

    /**
     * @param mixed $lacznaCena
     */
    public function setLacznaCena($lacznaCena) {
        $this->lacznaCena = $lacznaCena;
    }

    /**
     * @return mixed
     */
    public function getLacznaCena() {
        return $this->lacznaCena;
    }

    /**
     * @param mixed $lacznaProwizja
     */
    public function setLacznaProwizja($lacznaProwizja) {
        $this->lacznaProwizja = $lacznaProwizja;
    }

    /**
     * @return mixed
     */
    public function getLacznaProwizja() {
        return $this->lacznaProwizja;
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
        $this->setCzyPotwierdzone($stdObj->czyPotwierdzone);
        $this->setCzyWyslane($stdObj->czyWyslane);
        $this->setDataPlatnosci($stdObj->dataPlatnosci);
        $this->setDataZlozeniaZamowienia($stdObj->dataZlozeniaZamowienia);
        $this->setKosztTransportu($stdObj->kosztTransportu);
        $this->setLacznaCena($stdObj->lacznaCena);
        $this->setLacznaProwizja($stdObj->lacznaProwizja);
    }
}
