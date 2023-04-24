<?php

namespace App\Controller;

use App\Entity\Appliance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfoController extends AbstractController
{
    #[Route('/info/{id}', name: 'app_info')]
    public function info(?int $id,EntityManagerInterface $entityManager): Response
    {
        $Id2 = $entityManager->getRepository(Appliance::class);
        return $this->render('info.html.twig', [
            'data' => $Id2->find($id)
        ]);
    }
}
