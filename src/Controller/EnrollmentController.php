<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use App\Repository\ClassModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class EnrollmentController extends AbstractController
{
    #[Route('/', name: 'enrollment_homepage')]
    public function index(Environment $twig, ClassModelRepository $classRespository): Response
    {
        return $this->render('enrollment/index.html.twig', [
            'controller_name' => 'EnrollmentController',
            'classes' => $classRespository->findAll()
        ]);

    }
}
