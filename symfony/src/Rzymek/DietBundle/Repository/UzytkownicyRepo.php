<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Rzymek\DietBundle\Entity\Uzytkownicy;
use Rzymek\DietBundle\Entity\Uzytkownik;

class UzytkownicyRepo extends EntityRepository {
    public function findByLogin($login) {
        $em = $this->getEntityManager();
        $userDB = $em->find('DietBundle:Uzytkownicy', $user->getLogin());
        $user->setLogin($userDB->getLogin());
        $user->setEmail($userDB->getEmail());
        $user->setData($userDB->serialize());

    }

    public function findByEmail($email) {
        
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
        $metadata = $em->getClassMetaData(get_class($action));
        $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $em->flush();
    }

    public function update(Uzytkownik $user) {
        // pobierz
        $em = $this->getEntityManager();
        $userDB = $em->find('DietBundle:Uzytkownicy', $user->getLogin());
//        // deserializacja
//        $userUpdated = new Uzytkownik();
//        $userUpdated = $userUpdated->deserialize($userDB);
//        $userUpdated->setLogin($userDB->login);
//        $userUpdated->setEmail($userDB->email);

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
var_dump($userDB);
exit;
        //usun
        $em->remove($userDB);
        $em->flush();
    }
}
