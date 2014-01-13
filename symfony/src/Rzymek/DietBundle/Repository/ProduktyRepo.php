<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\Produkt;

class ProduktyRepo extends EntityRepository {
    public function findById($id) {

    }

    public function findByDietaId($dietaId) {

    }

    public function findByZamowienieId($id) {

    }

    public function findByOpisProduktuId($opisProduktuId) {

    }

    public function add(Produkt $produkt) {
        // serializacja

        //
        $em = $this->getEntityManager();
        $em->persist($action);
        $em->flush();
    }

    public function update(Produkt $produkt) {
        // pobierz
        // deserializacja
        // zmiana
        // serializacja
        // flush
    }

    public function delete() {

    }
}
