<?php
namespace Rzymek\DietBundle\Entity;

class Uzytkownik {
    protected $imieNazwisko;
    protected $email;
    protected $login;
    protected $haslo;
    protected $wiek;
    protected $waga;
    protected $wzrost;
    protected $typSylwetki;
    protected $bodyDensity;

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $user = new Uzytkownik();
        //set

        return $user;
    }
}
