<?php

namespace Rzymek\DietBundle\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Rzymek\DietBundle\Entity\Dieta;
use Rzymek\DietBundle\Entity\Diety;
use Rzymek\DietBundle\Entity\Uzytkownicy;
use Rzymek\DietBundle\Entity\Uzytkownik;

class DietyRepo extends EntityRepository {
    protected $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function findById($id) {
        $objDB = $this->em->find('DietBundle:Diety', $id);

        $obj = new Dieta();
        $obj->deserialize($objDB->getData());
        $obj->setId($objDB->getDietaId());

        return $obj;
    }

    public function findByUserLogin($login) {
        $qb = $this->em->createQueryBuilder();
        $qb->add('select', 'd')
            ->add('from', 'DietBundle:Diety d');
        $qb->innerJoin('d.login', 'u');
        $qb->add('where', 'u.login = :login')
            ->setParameters(array(
                ':login' => $login
            ))
        ;

        $results = $qb->getQuery()->getResult();

        $objArr = array();
        foreach ($results as $dietaDB) {
            $obj = new Dieta();
            $obj->deserialize($dietaDB->getData());
            $obj->setId($dietaDB->getDietaId());
            $objArr[] = $obj;
        }

        return $objArr;
    }

    public function add(Dieta $dieta) {
        // convert to db format
        $objDB = new Diety();

        $user = $this->em->find('DietBundle:Uzytkownicy', $dieta->getUserLogin());

        $objDB->setLogin($user);
        $objDB->setData($dieta->serialize());

        //
        $this->em->persist($objDB);
        $this->em->flush();
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
