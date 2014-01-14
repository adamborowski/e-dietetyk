<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\Dieta;

class DietyRepo extends EntityRepository {
    public function findById($id) {
        $em = $this->getEntityManager();
        $dietaFromDB = $this->find($id);
var_dump($dietaFromDB);
        $dieta = new Dieta();
        $dieta->deserialize($dietaFromDB);
var_dump($dieta);
exit();
        return $dieta;
    }

    public function findByLogin($login) {

    }

    public function add(Dieta $dieta) {
        // serializacja


        //
        $em = $this->getEntityManager();
        $em->persist($action);
        $em->flush();
    }

    public function update(Dieta $dieta) {
        // pobierz
        // deserializacja
        // zmiana
        // serializacja
        // flush
    }

    public function delete() {

    }
}
