<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/lucky")
*/
class LuckyController extends AbstractController
  {
     /**
      * @Route("/number", name = "number")
      */
    public function number()
    {
        $number = random_int(0, 100);

        // return new Response(
        //     '<html><body>Lucky number: '.$number.'</body></html>'
        // );

        return $this->render('lucky/number.html.twig', ['number' => $number,]);
    }
}