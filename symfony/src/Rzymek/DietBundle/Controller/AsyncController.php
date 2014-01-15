<?php
/**
 * Created by PhpStorm.
 * User: maciek
 * Date: 15/01/14
 * Time: 00:25
 */

namespace Rzymek\DietBundle\Controller;

use Rzymek\DietBundle\Entity\Uzytkownik;
use Rzymek\DietBundle\Lib\Auth;
use Rzymek\DietBundle\Repository\UzytkownicyRepo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AsyncController extends Controller {
    public function profileAction() {
        $json = "{'success':1,'data':{}}";
        return $this->render('DietBundle:Default:async.json.twig', array(
            'json' => $json
        ));
    }

    public function dietDetailsAction() {
        $json = "{'success':1,'data':{}}";
        return $this->render('DietBundle:Default:async.json.twig', array(
            'json' => $json
        ));
    }

    public function orderDetailsAction() {
        $json = "{'success':1,'data':{}}";
        return $this->render('DietBundle:Default:async.json.twig', array(
            'json' => $json
        ));
    }
}
