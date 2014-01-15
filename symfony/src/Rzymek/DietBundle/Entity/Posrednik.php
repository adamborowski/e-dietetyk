<?php
namespace Rzymek\DietBundle\Entity;

class Posrednik {
    public $id;
    public $nazwa;
    /**
     * @var string bezwzględny adres URL sklepu
     */
    public $urlSklepu;
    public $logo;

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
     * @param string $urlSklepu
     */
    public function setUrlSklepu($urlSklepu) {
        $this->urlSklepu = $urlSklepu;
    }

    /**
     * @return string
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

        $this->setId($stdObj->id);
        $this->setNazwa($stdObj->nazwa);
        $this->setLogo($stdObj->logo);
        $this->setUrlSklepu($stdObj->urlSklepu);
    }
}
