<?php
/**
 * Created by PhpStorm.
 * User: maciek
 * Date: 15/01/14
 * Time: 00:25
 */

namespace Rzymek\DietBundle\Controller;

use Rzymek\DietBundle\Entity\Dieta;
use Rzymek\DietBundle\Entity\Uzytkownik;
use Rzymek\DietBundle\Lib\Auth;
use Rzymek\DietBundle\Repository\DietyRepo;
use Rzymek\DietBundle\Repository\UzytkownicyRepo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AsyncController extends Controller {
    public function profileAction() {
        try {
            $em = $this->getDoctrine()->getManager();
            $auth = new Auth($em);
            $user = $auth->auth();

            $data = $this->get('request')->request->get('data');
            if (empty($data)) {
                throw new \RuntimeException();
            }

            $obj = json_decode($data);
            $user->setImieNazwisko($obj->imie . ' ' . $obj->nazwisko);
            $user->setWzrost($obj->wzrost);
            $user->setWiek($obj->wiek);
            $user->setWaga($obj->waga);
            $user->setPlec($obj->plec);
            $user->setBodyDensityBiodro(('kobieta' == $obj->plec) ?
                $obj->bodyDensity->biodro : $obj->bodyDensity->pepek);
            $user->setBodyDensityTriceps(('kobieta' == $obj->plec) ?
                $obj->bodyDensity->triceps : $obj->bodyDensity->klatka);
            $user->setBodyDensityUdo($obj->bodyDensity->udo);

            $userRepo = new UzytkownicyRepo($em);
            $userRepo->update($user);

            $json = "{success:1}";
        } catch (\RuntimeException $e) {
            $json = "{success:0}";
        }

        return $this->render('DietBundle:Default:async.json.twig', array(
            'json' => $json
        ));
    }

    public function dietDetailsAction() {
        try {
            $em = $this->getDoctrine()->getManager();
            $auth = new Auth($em);
            $user = $auth->auth();

            $data = $this->get('request')->request->get('data');
            if (empty($data)) {
                throw new \RuntimeException();
            }

            $obj = json_decode($data);
            $id = $obj->id;
            settype($id, 'int');

            $diet = new Dieta();
            $diet->setId($id);
            $diet->setUserLogin($user->getLogin());
            $diet->setCel($obj->cel);
            $diet->setLiczbaPosilkow($obj->liczbaPosilkow);
            $diet->setAktywnosci($obj->aktywnosci);

            $repo = new DietyRepo($em);
            if ($diet->getId()) {
                $repo->update($diet);
            } else {
                $repo->add($diet);
            }

            $json = "{success:1}";
        } catch (\RuntimeException $e) {
            $json = "{success:0}";
        }

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
