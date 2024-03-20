<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\User;
use App\Repository\ThreadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index(?Category $category): Response
    {

        return $this->render('home/index.html.twig',['category_id'=>$category?$category->getId():0]);
    }

    /***
     * @param Category|null $category
     * @param User|null $user
     * @return Response
     */
    public function loadThread(Request $request, ThreadRepository $threadRepository): Response
    {

        $valarr= [
            'category'=>$request->request->get('category'),
            'user'=>$request->request->get('user')
        ];
        $threads = $threadRepository->findBySelection($valarr);

        $data = ['message' => 'AJAX request received!',
            'html'=> $this->renderView('home/ajaxLoadThread.html.twig',[
                'threads'=> $threads
            ])
        ];
        return $this->json($data);
    }
}
