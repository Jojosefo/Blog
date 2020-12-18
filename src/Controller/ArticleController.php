<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    public function recentArticles(): Response
    {
       
        $articles = $this->getDoctrine()->getRepository(Article::class)
        ->findLatests(3);
        // get the recent articles somehow (e.g. making a database query)
    

        return $this->render('article/recent.html.twig',
        ['articles' => $articles]);

    }


    public function show(): Response
    {
        return $this->render('article/index.html.twig');
    }
}
