<?php
namespace Rzymek\DietBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Zamowienie {
    protected $dataZlozeniaZamowienia;
    protected $dataPlatnosci; // za zamówienie
    protected $czyPotwierdzone;
    protected $czyWyslane;
    protected $kosztTransportu;
    protected $lacznaCena;
    protected $lacznaProwizja;

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $zamowienie = new Zamowienie();
        //set

        return $zamowienie;
    }
}
