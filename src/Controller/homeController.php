<?php
// src/Controller/homeController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class homeController extends AbstractController
  {

      #[Route('/{name}', name: "hello")]
    public function hello($name)
    {
        return $this->render('home/hello.html.twig', ['name' => $name]);
    }

      #[Route('/', name: "home")]
    public function number()
    {
        $name = "input";
        return $this->render('home/hello.html.twig', ['name' => $name]);
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