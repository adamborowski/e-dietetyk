<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Rzymek\DietBundle\Entity\Uzytkownicy;
use Rzymek\DietBundle\Entity\Uzytkownik;

class UzytkownicyRepo extends EntityRepository {
    public function findByLogin($login) {
        $em = $this->getEntityManager();
        $userDB = $em->find('DietBundle:Uzytkownicy', $login);

        $user = new Uzytkownik();
        $user->deserialize($userDB->getData());

        return $user;
    }

    public function findByEmail($email) {
        //@todo: sprawdzić findByEmail
        $em = $this->getEntityManager();
        $userDB = $em->findByEmail('DietBundle:Uzytkownicy', $email);

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
        $em = $this->getEntityManager();
        $em->persist($userDB);

        // aby dzialalo id typu string
        $metadata = $em->getClassMetaData(get_class($userDB));
        $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $em->flush();
    }

    public function update(Uzytkownik $user) {
        // pobierz
        $em = $this->getEntityManager();
        $userDB = $em->find('DietBundle:Uzytkownicy', $user->getLogin());

        // serializacja
        $userDB->setEmail($user->getEmail());
        $userDB->setData($user->serialize());

        // flush
        $em->flush();
    }

    public function delete($login) {
        //pobierz
        $em = $this->getEntityManager();
        $userDB = $em->find('DietBundle:Uzytkownicy', $login);

        //usun
        $em->remove($userDB);
        $em->flush();
    }
}
