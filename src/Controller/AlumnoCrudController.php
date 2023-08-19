<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\Alumno1Type;
use App\Repository\AlumnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/alumno/crud')]
class AlumnoCrudController extends AbstractController
{
    #[Route('/', name: 'app_alumno_crud_index', methods: ['GET'])]
    public function index(AlumnoRepository $alumnoRepository): Response
    {
        return $this->render('alumno_crud/index.html.twig', [
            'alumnos' => $alumnoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_alumno_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $alumno = new Alumno();
        $form = $this->createForm(Alumno1Type::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($alumno);
            $entityManager->flush();

            return $this->redirectToRoute('app_alumno_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('alumno_crud/new.html.twig', [
            'alumno' => $alumno,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumno_crud_show', methods: ['GET'])]
    public function show(Alumno $alumno): Response
    {
        return $this->render('alumno_crud/show.html.twig', [
            'alumno' => $alumno,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_alumno_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Alumno $alumno, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Alumno1Type::class, $alumno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_alumno_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('alumno_crud/edit.html.twig', [
            'alumno' => $alumno,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumno_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Alumno $alumno, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumno->getId(), $request->request->get('_token'))) {
            $entityManager->remove($alumno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_alumno_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
