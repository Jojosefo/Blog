<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;
use App\Form\BlogPostType;

class AdminBlogController extends AbstractController
{
    /**
     * @Route("/admin/blog", name="admin_blog")
     */
    public function new(Request $request)
    {
        $article = new Articles();

        $form = $this->createForm(BlogPostType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            

            return $this->redirectToRoute('task_success');

        return $this->render('admin_blog/index.html.twig', [
            'form' => $form->createView(),
        ]);
        }
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

}

