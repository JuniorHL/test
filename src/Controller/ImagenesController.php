<?php

namespace App\Controller;

use App\Entity\Imagen;
use App\Form\ImagenType;
use App\Repository\ImagenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImagenesController extends AbstractController
{
    #[Route('/imagenes', name: 'app_imagenes')]
    public function index(Request $request, ImagenRepository $imagenRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $imagen = new Imagen();
        $form = $this->createForm(ImagenType::class, $imagen);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $archivo = $form['archivo']->getData();
            $destino = $this->getParameter('kernel.project_dir').'/public/img';
            $archivo->move($destino, $archivo->getClientOriginalName());
            $imagen->setArchivo($archivo->getClientOriginalName());
            $entityManagerInterface->persist($imagen);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_imagenes');
        }

        return $this->render('imagenes/index.html.twig', [
            'form' => $form,
            'imagenes' => $imagenRepository->findAll(),
        ]);
    }
}
