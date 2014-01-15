<?php
namespace Rzymek\DietBundle\Entity;

class OpisProduktu {
    public $id;
    public $posrednikId;
    public $cenaAktualna;
    public $nazwa;
    public $opis;
    public $zdjecie;
    public $prowizjaAktualna;
    /**
     * @var float wyróżnienie, miara jak bardzo wyróżnić produkt na tle reszty
     */
    public $waznosc;

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
     * @param mixed $posrednikId
     */
    public function setPosrednikId($posrednikId) {
        $this->posrednikId = $posrednikId;
    }

    /**
     * @return mixed
     */
    public function getPosrednikId() {
        return $this->posrednikId;
    }

    /**
     * @param mixed $cenaAktualna
     */
    public function setCenaAktualna($cenaAktualna) {
        $this->cenaAktualna = $cenaAktualna;
    }

    /**
     * @return mixed
     */
    public function getCenaAktualna() {
        return $this->cenaAktualna;
    }

    /**
     * @param mixed $nazwa
     */
    public function setNazwa($nazwa) {
        $this->nazwa = $nazwa;
    }

    /**
     * @return mixed
     */
    public function getNazwa() {
        return $this->nazwa;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis) {
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getOpis() {
        return $this->opis;
    }

    /**
     * @param mixed $prowizjaAktualna
     */
    public function setProwizjaAktualna($prowizjaAktualna) {
        $this->prowizjaAktualna = $prowizjaAktualna;
    }

    /**
     * @return mixed
     */
    public function getProwizjaAktualna() {
        return $this->prowizjaAktualna;
    }

    /**
     * @param \Rzymek\DietBundle\Entity\wyróżnienie $waznosc
     */
    public function setWaznosc($waznosc) {
        $this->waznosc = $waznosc;
    }

    /**
     * @return \Rzymek\DietBundle\Entity\wyróżnienie
     */
    public function getWaznosc() {
        return $this->waznosc;
    }

    /**
     * @param mixed $zdjecie
     */
    public function setZdjecie($zdjecie) {
        $this->zdjecie = $zdjecie;
    }

    /**
     * @return mixed
     */
    public function getZdjecie() {
        return $this->zdjecie;
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
        $this->setPosrednikId($stdObj->posrednikId);
        $this->setCenaAktualna($stdObj->cenaAktualna);
        $this->setNazwa($stdObj->nazwa);
        $this->setOpis($stdObj->opis);
        $this->setProwizjaAktualna($stdObj->prowizjaAktualna);
        $this->setWaznosc($stdObj->waznosc);
        $this->setZdjecie($stdObj->zdjecie);
    }
}
