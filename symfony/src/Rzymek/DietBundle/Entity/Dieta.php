<?php
namespace Rzymek\DietBundle\Entity;

class Dieta {
    protected $typ;
    protected $rodzaj;
    protected $czasAktywnosci;
    protected $preferencje;
    //@todo: ......

    /**
     * @param mixed $czasAktywnosci
     */
    public function setCzasAktywnosci($czasAktywnosci)
    {
        $this->czasAktywnosci = $czasAktywnosci;
    }

    /**
     * @return mixed
     */
    public function getCzasAktywnosci()
    {
        return $this->czasAktywnosci;
    }

    /**
     * @param mixed $preferencje
     */
    public function setPreferencje($preferencje)
    {
        $this->preferencje = $preferencje;
    }

    /**
     * @return mixed
     */
    public function getPreferencje()
    {
        return $this->preferencje;
    }

    /**
     * @param mixed $rodzaj
     */
    public function setRodzaj($rodzaj)
    {
        $this->rodzaj = $rodzaj;
    }

    /**
     * @return mixed
     */
    public function getRodzaj()
    {
        return $this->rodzaj;
    }

    /**
     * @param mixed $typ
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
    }

    /**
     * @return mixed
     */
    public function getTyp()
    {
        return $this->typ;
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
        $dieta = new Dieta();
//        $dieta->setCzasAktywnosci($stdObj->czasAktywnosci);
        //@todo dalej settery

        return $dieta;
    }
}
