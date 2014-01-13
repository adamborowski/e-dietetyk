<?php
namespace Rzymek\DietBundle\Entity;

class OpisProduktu {
    protected $cenaAktualna;
    protected $nazwa;
    protected $opis;
    protected $zdjecie;
    protected $prowizjaAktualna;
    protected $waznosc; // wyróżnienie (miara jak bardzo wyróżnić produkt na tle reszty), nie musi być, jak starczy czasu to fajny bajer

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $op = new OpisProduktu();
        //set

        return $op;
    }
}
