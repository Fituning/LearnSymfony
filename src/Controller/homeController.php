<?php
// src/Controller/homeController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class homeController extends AbstractController
  {

     #[Route("/home", name: "home")]
    public function number()
    {
        $number = "input";
        return $this->render('home/hello.html.twig', ['number' => $number,]);
    }

     #[Route('/test/{slug}', name: 'home2')]
      public function show(string $slug = 'yapas'): Response
      {
          return $this->render('home/hello.html.twig', ['number' => $slug,]);
      }

    #[Route('/test2', name: 'home3', defaults: ['page' => 1 , 'title' => 'first page' ] )]
    public function lol(int $page, string $title): Response
    {
        return $this->render('home/hello2.html.twig', ['page' => $page, 'title' => $title]);
    }
    #[Route('/test3', name: 'Page menu numéro 4')]
    public function func(Request $request): Response
    {
        $data = $request->attributes->get('_route_params');
        return 0;
    }

//    #[Route('/test/{slug}', name: 'home2')]
//    public function show(BlogPost $post ): Response
//    {
//        return $this->render('home/hello.html.twig', ['number' => $slug,]);
//    }
}