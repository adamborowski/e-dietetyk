<?php
namespace Rzymek\DietBundle\Entity;

class Posrednik {
    protected $nazwa;
    /**
     * @var string bezwzględny adres URL sklepu
     */
    protected $urlSklepu;
    protected $logo;

    /**
     * @param mixed $logo
     */
    public function setLogo($logo) {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getLogo() {
        return $this->logo;
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
     * @param \Rzymek\DietBundle\Entity\bezwzględny $urlSklepu
     */
    public function setUrlSklepu($urlSklepu) {
        $this->urlSklepu = $urlSklepu;
    }

    /**
     * @return \Rzymek\DietBundle\Entity\bezwzględny
     */
    public function getUrlSklepu() {
        return $this->urlSklepu;
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

        $this->setNazwa($stdObj->nazwa);
        $this->setLogo($stdObj->logo);
        $this->setUrlSklepu($stdObj->urlSklepu);
    }
}
