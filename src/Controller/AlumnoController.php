<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AlumnoType;
use App\Repository\AlumnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlumnoController extends AbstractController
{
    #[Route('/alumno', name: 'app_alumno')]
    public function index(Request $request, EntityManagerInterface $entityManager, AlumnoRepository $alumnoRepository): Response
    {
        $alumno = new Alumno();
        $form = $this->createForm(AlumnoType::class,$alumno);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($alumno);
            $entityManager->flush();
            return $this->redirectToRoute('app_alumno');
       }
        return $this->render('alumno/index.html.twig', [
            'form' => $form,
            'alumno'=> $alumnoRepository->findAll(),
        ]);
    }
}