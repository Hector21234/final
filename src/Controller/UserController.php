<?php

namespace App\Controller;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/insertarUser', name: 'app_insertarUser')]
    public function insertUsuario(EntityManagerInterface $entityManager, Request $request): Response
    {
        if (count($request->request->all())) {
            $insert = $entityManager->getRepository(Usuario::class);
            $insert->insertUsuario($request->request->all());
            
            return $this->redirectToRoute('app_main', []);
        }else{
            return $this->render('InsertarUsuario.html.twig', []);

        }
        
    }
}
