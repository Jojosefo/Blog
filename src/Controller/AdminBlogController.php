<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\BlogPostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class AdminBlogController extends AbstractController
{
    /**
     * @Route("/admin/connexion", name="admin_blog")
     */
    public function index(Request $request)
    {


    }



    /**
     * @Route("/admin", name="admin_blog")
     */
    public function new(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $article = new Article();

        $form = $this->createForm(BlogPostType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $article = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            

            return $this->redirectToRoute('task_success');

        
        }

        return $this->render('admin_blog/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/success", name="task_success")
     */
    public function show(): Response
    {
        return $this->render('admin_blog/success.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/article/{id}", name="article1")
     */
    public function showArticle($id)
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
            'article' => $article, 
        ]);
    }

}

