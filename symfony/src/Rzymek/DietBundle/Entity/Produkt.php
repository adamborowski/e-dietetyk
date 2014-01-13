<?php
namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Produkt {
    protected $cena; // na chwilę zamówienia (może być nieaktualna)
    protected $iloscSztuk;
    protected $prowizja; // na chwilę zamówienia

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $produkt = new Produkt();
        //set

        return $dieta;
    }
}
