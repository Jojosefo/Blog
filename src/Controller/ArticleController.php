<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticlesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function show()
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);

        if(!$article){
            throw $this->createNotFoundException(
                'Pas d\'articles correspondant avec l\'id'.$id
            );
        }

        return $this->render('article/index.html.twig', [
            'titre' => $titre, 'media' => $media,
        ]);
    }
}
