<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Entity\Article;

class FormController extends AbstractController
{

    public function __construct(protected EntityManagerInterface $em)
    {

    }

    #[Route("/form/new" ,name: "formulaire1" )]
    public function new(Request $request)
    {
        $article = new Article();
        $article->setTitle('Hello World');
        $article->setContent('Un très court article.');
        $article->setAuthor('Zozor');

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form ->isSubmitted() && $form ->isValid()){
            dump($article);
            $this->em->persist($article);
            $this->em->flush();
        }

        return $this->render('default/new.html.twig', array(
            'articleForm' => $form->createView(),
        ));
    }

    #[Route("/form/update/{id<\d+>}" ,name: "formulaire2" )]
    public function update(Request $request, Article $article)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form ->isSubmitted() && $form ->isValid()){
            $this->em->flush();
        }

        return $this->render('default/new.html.twig', array(
            'articleForm' => $form->createView(), 'articleId' => $article->id
        ));
    }

    #[Route("/form/delete/{id<\d+>}" ,name: "formulaire3" )]
    public function delete(Request $request, Article $article)
    {
        $this->em->remove($article);
        $this->em->flush();

        return $this->redirectToRoute("formulaire1");
    }

    #[Route("/form/showroom" ,name: "showroom" )]
    public function showroom(Request $request,ManagerRegistry $doctrine)
    {
        $repos = $doctrine->getRepository(Article::class);
        $articles = $repos->findALL();

        return $this->render('default/showroom.html.twig', ['articles' => $articles]);
    }
}