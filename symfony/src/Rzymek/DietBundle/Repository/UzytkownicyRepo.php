<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Rzymek\DietBundle\Entity\Uzytkownik;

class UzytkownicyRepo extends EntityRepository {
    public function findByLogin($login) {

    }

    public function findByEmail($email) {

    }

    public function add(Uzytkownik $user) {
        // serializacja

        //
        $em = $this->getEntityManager();
        $em->persist($action);

        // aby dzialalo id typu string
        $metadata = $em->getClassMetaData(get_class($action));
        $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $em->flush();

        //        $em->refresh($action);
        //        return $action;
    }

    public function update(Uzytkownik $user) {
        // pobierz
        // deserializacja
        // zmiana
        // serializacja
        // flush
    }

    public function delete() {

    }
}
