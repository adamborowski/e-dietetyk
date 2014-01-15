<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Rzymek\DietBundle\Entity\Uzytkownicy;
use Rzymek\DietBundle\Entity\Uzytkownik;

class UzytkownicyRepo {
    protected $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function findByLogin($login) {
        $userDB = $this->em->find('DietBundle:Uzytkownicy', $login);

        $user = new Uzytkownik();
        $user->deserialize($userDB->getData());

        return $user;
    }

    public function add(Uzytkownik $user) {
        // convert to db user format
        $userDB = new Uzytkownicy();
        $userDB->setLogin($user->getLogin());
        $userDB->setEmail($user->getEmail());
        $userDB->setData($user->serialize());

        //
        $this->em->persist($userDB);

        // aby dzialalo id typu string
        $metadata = $this->em->getClassMetaData(get_class($userDB));
        $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $this->em->flush();
    }

    public function update(Uzytkownik $user) {
        // pobierz
        $userDB = $this->em->find('DietBundle:Uzytkownicy', $user->getLogin());

        // serializacja
        $userDB->setEmail($user->getEmail());
        $userDB->setData($user->serialize());

        // flush
        $this->em->flush();
    }

    public function delete($login) {
        //pobierz
        $userDB = $this->em->find('DietBundle:Uzytkownicy', $login);

        //usun
        $this->em->remove($userDB);
        $this->em->flush();
    }
}
