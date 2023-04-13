<?php

namespace App\Controller;
use App\Entity\Appliance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Appliance::class);
        $data = $repository->findAll();
        return $this->render('list.html.twig', [
            "data"=>$data
        ]);
    }
}
