<?php
/**
 * Created by PhpStorm.
 * User: maciek
 * Date: 14/01/14
 * Time: 23:30
 */

namespace Rzymek\DietBundle\Lib;

use Doctrine\Common\Persistence\ObjectManager;
use Rzymek\DietBundle\Repository\UzytkownicyRepo;
use Symfony\Component\HttpFoundation\Session\Session;
use Rzymek\DietBundle\Entity\Uzytkownik;

/**
 * Class Auth
 * @package Rzymek\DietBundle\Lib
 *
 * Służy do uwierzytelnienia zalogowanego użytkownika (sesja, ciastko).
 * W przypadku braku uwierzytelnienia tworzy konto demo i loguje na nie.
 */
class Auth {
    protected $em;

    public function __construct(ObjectManager $em) {
        $this->em = $em;
    }

    /**
     * @returns Uzytkownik
     */
    public function auth() {
        $s = new Session();
        $s->start();

        $userRepo = new UzytkownicyRepo($this->em);

        $login = $s->get('login');
        if (empty($login)) {
            // stwórz użytkownika demo
            $user = new Uzytkownik();
            $login = 'demo' . time();
            $user->setLogin($login);
            $user->setEmail('example@gmail.com');
            $user->setImieNazwisko('Jan Kowalski');
            $user->setWaga(70);
            $user->setPlec(Uzytkownik::MALE);
            $user->setTypSylwetki(Uzytkownik::MEZOMORFIK);
            $user->setBodyDensityBiodro(40);
            $user->setBodyDensityUdo(30);
            $user->setBodyDensityTriceps(10);
            $user->setWiek(22);
            $user->setWzrost(180);

            $userRepo->add($user);
            $s->set('login', $login);
        }

        // pobierz usera z bazy
        $user = $userRepo->findByLogin($login);
        return $user;
    }
}
