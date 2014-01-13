<?php
namespace Rzymek\DietBundle\Entity;

class Dieta {
    protected $typ;
    protected $rodzaj;
    protected $czasAktywnosci;
    protected $preferencje;

    //@todo: ......

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $dieta = new Dieta();
        //set

        return $dieta;
    }
}
