<?php

namespace Rzymek\DietBundle\Controller;

use Rzymek\DietBundle\Entity\Uzytkownik;
use Rzymek\DietBundle\Lib\Auth;
use Rzymek\DietBundle\Repository\UzytkownicyRepo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    public function indexAction() {
        /**
         * strona główna
         * [zrobione]
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:index.html.twig', array('user' => $user));
    }

    public function profileAction() {
        /**
         * profil użytkownika
         * obecnie tylko parametry ciała (bez części użytkownika, m.in. login, email, hasło etc.)
         *
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:profile.html.twig', array('user' => $user));
    }

    public function dietAction() {
        /**
         * lista diet, przycisk nowa dieta
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:diet.html.twig', array('user' => $user));
    }

    public function dietDetailsAction() {

        /**
         * Parametry ciała z profilu oraz:
         * - aktywności fizyczne z diety (rodzaj, intensywność, czas trwania) / tydzień
         * - cel diety (schudnięcie, przybranie masy, bez zmian)
         * - liczba posiłków dziennie (sugerowana liczba zależna od celu i typu sylwetki)
         * posłuży za dane do "algorytmu" układającego dietę.
         *
         * Algorytm ten:
         * - obliczy całkowite dzienne zapotrzebowanie na kalorie (wzór),
         * - podzieli w/w na W,B i T według określonych proporcji (np. 50,25,25%)
         * - podzieli w/w na W,B i T dla poszczególnych posiłków
         *   (rano - dużo W, im później to mniej W, ostatni posiłek 0 W)
         *   (białka i tłuszcze w miarę równomiernie w ciągu dnia)
         *   (najbardziej kaloryczne: śniadanie, III posiłek, II posiłek, IV ..., ostatni - może być więcej T i B )
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:diet_details.html.twig', array('user' => $user));
    }

    public function ordersAction() {
        /**
         * lista zamówień, data, status, po kliknięciu szczegóły -> lista produktów
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:orders.html.twig', array('user' => $user));
    }

    public function productsAction() {
        /**
         * Wybieranie polecanych produktów do diety.
         * Obecnie może odbywać się losowo, ew. uwzględniając przy tym wyróżnienia ;)
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:products.html.twig', array('user' => $user));
    }

    public function customersAction() {
        /**
         * przykładowi klienci
         * [zrobione]
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:customers.html.twig', array('user' => $user));
    }

    public function aboutAction() {
        /**
         * o nas
         * [zrobione]
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:about.html.twig', array('user' => $user));
    }

    public function testAction() {
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

//        $userRepo = new UzytkownicyRepo($em);
//        // zmień nazwisko
//        $user->setImieNazwisko('Zenon Laskowik');
//        $userRepo->update($user);
//        // usuń
//        $userRepo->delete('demo1389740857');


        //
        return $this->render('DietBundle:Default:test.html.twig', array('user' => $user));
    }
}
