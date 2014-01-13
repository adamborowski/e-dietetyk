<?php
namespace Rzymek\DietBundle\Entity;

class Posrednik {
    protected $nazwa;
    protected $urlSklepu; //bezwzględny adres URL sklepu
    protected $logo;

    public function __construct() {
        ;
    }

    public function serialize() {
        $serializedObj = json_encode($this);
        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $posrednik = new Posrednik();
        //set

        return $posrednik;
    }
}
