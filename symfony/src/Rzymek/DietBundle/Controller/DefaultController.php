<?php

namespace Rzymek\DietBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    public function indexAction() {
        /**
         * strona główna
         * [zrobione]
         */
        //return $this->render('DietBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('DietBundle:Default:index.html.twig');
    }

    public function profileAction() {
        /**
         * profil użytkownika
         * obecnie tylko parametry ciała (bez części użytkownika, m.in. login, email, hasło etc.)
         *
         * @todo: utworzyć jednego użytkownika demo (ew. tworzyć przy każdej nowej sesji użytkownika demo#N) i zalogować go domyślnie
         */
        return $this->render('DietBundle:Default:profile.html.twig');
    }

    public function dietAction() {
        $dietaRepo = $this->getDoctrine()->getRepository('DietBundle:DietaRepository');
        $dietaRepo->find(1);

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
        return $this->render('DietBundle:Default:diet.html.twig');
    }

    public function ordersAction() {
        /**
         * lista zamówień, data, status, po kliknięciu szczegóły -> lista produktów
         */
        return $this->render('DietBundle:Default:orders.html.twig');
    }

    public function productsAction() {
        /**
         * Wybieranie polecanych produktów do diety.
         * Obecnie może odbywać się losowo, ew. uwzględniając przy tym wyróżnienia ;)
         */
        return $this->render('DietBundle:Default:products.html.twig');
    }

    public function customersAction() {
        /**
         * przykładowi klienci
         * [zrobione]
         */
        return $this->render('DietBundle:Default:customers.html.twig');
    }

    public function aboutAction() {
        /**
         * o nas
         * [zrobione]
         */
        return $this->render('DietBundle:Default:about.html.twig');
    }



    public function contactAction() {
        // nieużywany
        return $this->render('DietBundle:Default:contact.html.twig');
    }
}
