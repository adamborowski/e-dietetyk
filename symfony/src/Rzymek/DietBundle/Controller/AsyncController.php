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
        return "{'success':1,'dane':{}}";
    }
}
