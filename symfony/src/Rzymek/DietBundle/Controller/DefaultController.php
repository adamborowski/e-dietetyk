<?php

namespace Rzymek\DietBundle\Controller;

use Rzymek\DietBundle\Entity\Dieta;
use Rzymek\DietBundle\Entity\Uzytkownik;
use Rzymek\DietBundle\Lib\Auth;
use Rzymek\DietBundle\Repository\DietyRepo;
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

        $dietyRepo = new DietyRepo($em);
        $diets = $dietyRepo->findByUserLogin($user->getLogin());

        return $this->render('DietBundle:Default:diet.html.twig', array(
            'user' => $user,
            'diets' => $diets
        ));
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
        $id = $this->get('request')->get('id');
        settype($id, 'int');

        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        $diet = null;
        if (!empty($id)) {
            $repo = new DietyRepo($em);
            $diet = $repo->findById($id);
        }

        return $this->render('DietBundle:Default:diet_details.html.twig', array(
            'user' => $user,
            'diet' => $diet
        ));
    }

    public function dietPlanAction() {
        $id = $this->get('request')->get('id');
        settype($id, 'int');

        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        $diet = null;
        if (empty($id)) {
            return $this->render('DietBundle:Default:diet.html.twig', array('user' => $user));
        }

        $repo = new DietyRepo($em);
        $diet = $repo->findById($id);

        // algorytm
        $nutKcal = array(4.0, 4.0, 9.0); // W, B, T
        $splitParam = array(0.5, 0.25, 0.25); // suma = 1.0
        $mealSplit = array(     // podział kcal na posiłki
            2 => array(0.6, 0.4),
            3 => array(0.5, 0.3, 0.2),
            4 => array(0.4, 0.3, 0.2, 0.1),
            5 => array(0.3, 0.2, 0.2, 0.2, 0.1),
            6 => array(0.3, 0.15, 0.15, 0.15, 0.15, 0.1)
        );

        $amountMeals = $diet->getLiczbaPosilkow();
        if ($amountMeals > 6) {
            $amountMeals = 6;
        } elseif ($amountMeals < 2) {
            $amountMeals = 2;
        }

        //@todo: wykorzystanie wzoru na total kcal
        $totalKcal = 3000; // ze wzoru (profil i dieta)
        $totalW = $totalKcal / $nutKcal[0] * $splitParam[0];
        $totalB = $totalKcal / $nutKcal[1] * $splitParam[1];
        $totalT = $totalKcal / $nutKcal[2] * $splitParam[2];

        $meals = array(); // podział jak w $splitParam, tyle że W z ostatniego posiłku na pierwszy
        $mealParam = $mealSplit[$amountMeals];
        foreach ($mealParam as $param) {
            $meals[] = array(
                round($totalW * $param, 2), // W
                round($totalB * $param, 2), // B
                round($totalT * $param, 2) // T
            );
        }
        $lastIndex = count($meals) - 1;
        $meals[0][0] += $meals[$lastIndex][0];
        $meals[$lastIndex][0] = 0;

        //
        $plan = array(
            'total' => round($totalKcal, 2),
            'split' => array(round($totalW, 2), round($totalB, 2), round($totalT, 2)),
            'meals' => $meals
        );


        return $this->render('DietBundle:Default:diet_plan.html.twig', array(
            'user' => $user,
            'diet' => $diet,
            'plan' => $plan
        ));
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

    public function ordersDetailsAction() {
        /**
         * szczegóły zamówienia (lista wybranych produktów)
         */
        $em = $this->getDoctrine()->getManager();
        $auth = new Auth($em);
        $user = $auth->auth();

        return $this->render('DietBundle:Default:orders_details.html.twig', array('user' => $user));
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

//        $dietaRepo = new DietyRepo($em);
//        $results = $dietaRepo->findByUserLogin('demo1389745483');

//        $dieta = new Dieta();
//        $dieta->setAktywnosci(array('rano' => 'bieganie', 'potem' => 'plywanie'));
//        $dieta->setCel('masa');
//        $dieta->setLiczbaPosilkow(4);
//        $dieta->setNazwa('test');
//        $dieta->setUserLogin('demo1389743221');
//        $dietaRepo = new DietyRepo($em);
//        $dietaRepo->add($dieta);

//        $dietaRepo = new DietyRepo($em);
//        $dieta = $dietaRepo->findById(2);
//        $dieta->setNazwa('pierwsza dieta');
//        $dietaRepo->update($dieta);

//        $dietaRepo = new DietyRepo($em);
//        $dietaRepo->delete(2);
        //
        return $this->render('DietBundle:Default:test.html.twig', array('user' => $user));
    }
}
