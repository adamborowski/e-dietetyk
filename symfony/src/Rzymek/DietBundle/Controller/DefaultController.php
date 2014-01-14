<?php

namespace Rzymek\DietBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    public function indexAction() {
        //return $this->render('DietBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('DietBundle:Default:index.html.twig');
    }

    public function profileAction() {
        return $this->render('DietBundle:Default:profile.html.twig');
    }

    public function dietAction() {
        $dietaRepo = $this->getDoctrine()->getRepository('DietBundle:DietaRepository');
        $dietaRepo->find(1);

        return $this->render('DietBundle:Default:diet.html.twig');
    }

    public function customersAction() {
        return $this->render('DietBundle:Default:customers.html.twig');
    }

    public function aboutAction() {
        return $this->render('DietBundle:Default:about.html.twig');
    }

    public function ordersAction() {
        return $this->render('DietBundle:Default:orders.html.twig');
    }

    public function contactAction() {
        return $this->render('DietBundle:Default:contact.html.twig');
    }
}
