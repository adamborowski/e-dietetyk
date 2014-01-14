<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\Dieta;
use Rzymek\DietBundle\Entity\Diety;

class DietyRepo extends EntityRepository {
    public function findById($id) {
        $em = $this->getEntityManager();
        $objDB = $em->find('DietBundle:Diety', $id);

        $obj = new Dieta();
        $obj->deserialize($objDB->getData());

        return $obj;
    }

    public function findByUserLogin($login) {
        //@todo: tu może być lista, wiele obiektów
        $em = $this->getEntityManager();
        $objDB = $em->findByLogin('DietBundle:Diety', $login);

        $obj = new Dieta();
        $obj->deserialize($objDB->getData());

        return $obj;
    }

    public function add(Dieta $dieta) {
        // convert to db format
        $objDB = new Diety();
        $objDB->setLogin($dieta->getUserLogin());
        $objDB->setData($dieta->serialize());

        //
        $em = $this->getEntityManager();
        $em->persist($objDB);
        $em->flush();
    }

    public function update(Dieta $dieta) {
        // pobierz
        $em = $this->getEntityManager();
        $objDB = $em->find('DietBundle:Diety', $dieta->getId());

        // serializacja
        $objDB->setLogin($dieta->getUserLogin());
        $objDB->setData($dieta->serialize());

        // flush
        $em->flush();
    }

    public function delete($id) {
        // pobierz
        $em = $this->getEntityManager();
        $objDB = $em->find('DietBundle:Diety', $id);

        // usuń
        $em->remove($objDB);
        $em->flush();
    }
}
