<?php
namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Produkt {
    public $id;
    public $opisProdId;
    public $zamowienieId;
    public $dietaId;
    public $cena; // na chwilę zamówienia (może być nieaktualna)
    public $iloscSztuk;
    public $prowizja;

    /**
     * @param mixed $cena
     */
    public function setCena($cena) {
        $this->cena = $cena;
    }

    /**
     * @return mixed
     */
    public function getCena() {
        return $this->cena;
    }

    /**
     * @param mixed $dietaId
     */
    public function setDietaId($dietaId) {
        $this->dietaId = $dietaId;
    }

    /**
     * @return mixed
     */
    public function getDietaId() {
        return $this->dietaId;
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
     * @param mixed $iloscSztuk
     */
    public function setIloscSztuk($iloscSztuk) {
        $this->iloscSztuk = $iloscSztuk;
    }

    /**
     * @return mixed
     */
    public function getIloscSztuk() {
        return $this->iloscSztuk;
    }

    /**
     * @param mixed $opisProdId
     */
    public function setOpisProdId($opisProdId) {
        $this->opisProdId = $opisProdId;
    }

    /**
     * @return mixed
     */
    public function getOpisProdId() {
        return $this->opisProdId;
    }

    /**
     * @param mixed $prowizja
     */
    public function setProwizja($prowizja) {
        $this->prowizja = $prowizja;
    }

    /**
     * @return mixed
     */
    public function getProwizja() {
        return $this->prowizja;
    }

    /**
     * @param mixed $zamowienieId
     */
    public function setZamowienieId($zamowienieId) {
        $this->zamowienieId = $zamowienieId;
    }

    /**
     * @return mixed
     */
    public function getZamowienieId() {
        return $this->zamowienieId;
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
        $this->setDietaId($stdObj->dietaId);
        $this->setOpisProdId($stdObj->opisProdId);
        $this->setZamowienieId($stdObj->zamowienieId);
        $this->setCena($stdObj->cena);
        $this->setIloscSztuk($stdObj->iloscSztuk);
        $this->setProwizja($stdObj->prowizja);
    }
}
