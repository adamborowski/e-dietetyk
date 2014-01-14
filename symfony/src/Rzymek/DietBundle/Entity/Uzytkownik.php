<?php
namespace Rzymek\DietBundle\Entity;

class Uzytkownik {
    protected $login;
    protected $haslo;
    protected $wiek;
    protected $waga;
    protected $wzrost;
    protected $typSylwetki;
    protected $bodyDensity;
    protected $imieNazwisko;
    protected $email;

    public function __construct() {
        ;
    }

    /**
     * @param mixed $bodyDensity
     */
    public function setBodyDensity($bodyDensity)
    {
        $this->bodyDensity = $bodyDensity;
    }

    /**
     * @return mixed
     */
    public function getBodyDensity()
    {
        return $this->bodyDensity;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $haslo
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;
    }

    /**
     * @return mixed
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * @param mixed $imieNazwisko
     */
    public function setImieNazwisko($imieNazwisko)
    {
        $this->imieNazwisko = $imieNazwisko;
    }

    /**
     * @return mixed
     */
    public function getImieNazwisko()
    {
        return $this->imieNazwisko;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $typSylwetki
     */
    public function setTypSylwetki($typSylwetki)
    {
        $this->typSylwetki = $typSylwetki;
    }

    /**
     * @return mixed
     */
    public function getTypSylwetki()
    {
        return $this->typSylwetki;
    }

    /**
     * @param mixed $waga
     */
    public function setWaga($waga)
    {
        $this->waga = $waga;
    }

    /**
     * @return mixed
     */
    public function getWaga()
    {
        return $this->waga;
    }

    /**
     * @param mixed $wiek
     */
    public function setWiek($wiek)
    {
        $this->wiek = $wiek;
    }

    /**
     * @return mixed
     */
    public function getWiek()
    {
        return $this->wiek;
    }

    /**
     * @param mixed $wzrost
     */
    public function setWzrost($wzrost)
    {
        $this->wzrost = $wzrost;
    }

    /**
     * @return mixed
     */
    public function getWzrost()
    {
        return $this->wzrost;
    }

    public function serialize() {
        $serializedObj = json_encode($this);

        return $serializedObj;
    }

    public function deserialize($serializedObj) {
        $stdObj = json_decode($serializedObj);
        $user = new Uzytkownik();
        $user->setBodyDensity($stdObj->bodyDensity);
        $user->setHaslo($stdObj->haslo);
        $user->setImieNazwisko($stdObj->imieNazwisko);
        $user->setTypSylwetki($stdObj->typSylwetki);
        $user->setWaga($stdObj->waga);
        $user->setWiek($stdObj->wiek);
        $user->setWzrost($stdObj->wzrost);

        return $user;
    }
}
