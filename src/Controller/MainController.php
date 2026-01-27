<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main_index', methods: [Request::METHOD_GET])]
    public function index(Request $request): Response
    //public function index(#[MapQueryParameter('name')] string $name = 'World'): Response
    {
        $name = $request->query->getString('name', 'World');

        return new Response("Hello " . $name);
    }

    #[Route('/contact', name: 'app_main_contact', methods: ['GET'])]
    public function contact(): Response
    {
        return new Response('Contact');
    }
}
