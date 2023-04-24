<?php

namespace App\Controller;


use App\Entity\Appliance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrudController extends AbstractController
{
    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(int $id, EntityManagerInterface $entityManager): Response
    {
        $delete = $entityManager->getRepository(Appliance::class);
        $delete->delete($id);
        return $this->redirectToRoute('app_main', []);
    }


    #[Route('/insertar', name: 'app_insertar')]
    public function insert(EntityManagerInterface $entityManager, Request $request): Response
    {
        if (count($request->request->all())) {
            $insert = $entityManager->getRepository(Appliance::class);
            $insert->insert($request->request->all());
            
            return $this->redirectToRoute('app_list', []);
        }else{
            return $this->render('insertap.html.twig', []);

        }
        
    }
}
