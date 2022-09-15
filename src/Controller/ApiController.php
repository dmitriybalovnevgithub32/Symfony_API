<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/backend/api', name: 'app_backend_api')]
    public function index(): Response
    {

        $newsession = new Session();

        $newsession->set('data');

        $newsession->get('data');

        $token = Tokeng
        return $this->render('backend_api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/backend/api', name: 'app_backend_api')]
    public function index2()
    {

    }

    #[Route('/backend/api', name: 'app_backend_api')]
    public function index3()
    {

    }
}
