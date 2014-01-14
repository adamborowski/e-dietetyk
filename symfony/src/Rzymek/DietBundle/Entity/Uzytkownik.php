<?php
namespace Rzymek\DietBundle\Entity;

class Uzytkownik {
    // płeć
    const MALE = 'mężczyzna';
    const FEMALE = 'kobieta';

    // typ sylwetki
    const EKTOMORFIK = 'ektomorfik';
    const MEZOMORFIK = 'mezomorfik';
    const ENDOMORFIK = 'endomorfik';

    public $login;
    public $haslo;
    public $wiek;
    public $waga;
    public $wzrost;
    public $typSylwetki;
    public $bodyDensityBiodro; // dla M pępęk
    public $bodyDensityUdo;
    public $bodyDensityTriceps; // dla M klatka
    public $imieNazwisko;
    public $email;
    public $plec;

    public function __construct() {
        ;
    }

    /**
     * @param mixed $plec
     */
    public function setPlec($plec) {
        $this->plec = $plec;
    }

    /**
     * @return mixed
     */
    public function getPlec() {
        return $this->plec;
    }

    /**
     * @param mixed $bodyDensityBiodro
     */
    public function setBodyDensityBiodro($bodyDensityBiodro) {
        $this->bodyDensityBiodro = $bodyDensityBiodro;
    }

    /**
     * @return mixed
     */
    public function getBodyDensityBiodro() {
        return $this->bodyDensityBiodro;
    }

    /**
     * @param mixed $bodyDensityTriceps
     */
    public function setBodyDensityTriceps($bodyDensityTriceps) {
        $this->bodyDensityTriceps = $bodyDensityTriceps;
    }

    /**
     * @return mixed
     */
    public function getBodyDensityTriceps() {
        return $this->bodyDensityTriceps;
    }

    /**
     * @param mixed $bodyDensityUdo
     */
    public function setBodyDensityUdo($bodyDensityUdo) {
        $this->bodyDensityUdo = $bodyDensityUdo;
    }

    /**
     * @return mixed
     */
    public function getBodyDensityUdo() {
        return $this->bodyDensityUdo;
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
        $this->setLogin($stdObj->login);
        $this->setHaslo($stdObj->haslo);
        $this->setWiek($stdObj->wiek);
        $this->setWaga($stdObj->waga);
        $this->setWzrost($stdObj->wzrost);
        $this->setTypSylwetki($stdObj->typSylwetki);
        $this->setBodyDensityBiodro($stdObj->bodyDensityBiodro);
        $this->setBodyDensityUdo($stdObj->bodyDensityUdo);
        $this->setBodyDensityTriceps($stdObj->bodyDensityTriceps);
        $this->setImieNazwisko($stdObj->imieNazwisko);
        $this->setEmail($stdObj->email);
        $this->setPlec($stdObj->plec);
    }
}
