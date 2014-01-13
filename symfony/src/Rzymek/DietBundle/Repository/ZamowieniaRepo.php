<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\Zamowienie;

class ZamowieniaRepo extends EntityRepository {
    public function findById($id) {

    }

    public function findByLogin($login) {

    }

    public function add(Zamowienie $zamowienie) {
        // serializacja

        //
        $em = $this->getEntityManager();
        $em->persist($action);
        $em->flush();
    }

    public function update(Zamowienie $zamowienie) {
        // pobierz
        // deserializacja
        // zmiana
        // serializacja
        // flush
    }

    public function delete() {

    }
}
