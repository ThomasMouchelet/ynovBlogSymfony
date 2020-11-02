<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name=".list")
     */
    public function index(ArticleRepository $ripo): Response
    {
        // $article = new Article();
        // $article->setTitle('Title 2')
        //     ->setDescription('Lorem 2')
        //     ->setCreatedAt(new \DateTime());
        // $manager = $this->getDoctrine()->getManager();
        // $manager->persist($article);
        // $manager->flush();

        $articles = $ripo->findAll();

        return $this->render('blog/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/articles/{id}",name="articles.show")
     */
    public function show(Article $article, Request $request)
    {
        // dd($request);

        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }
}
