<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\OpisProduktu;

class OpisProduktowRepo extends EntityRepository {
    public function findById($id) {
        $em = $this->getEntityManager();
        $objDB = $em->find('DietBundle:OpisyProduktow', $id);

        $obj = new OpisProduktu();
        $obj->deserialize($objDB->getData());

        return $obj;
    }

    public function findByPosrednikId($id) {
        //@todo: implement findByPosrednikId
    }

    public function getAll() {

    }
}
