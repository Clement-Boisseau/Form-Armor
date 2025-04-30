<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Bundle\PaginatorBundle;
use Doctrine\Persistence\ManagerRegistry;

// Nécessaire pour la pagination
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator

use App\Entity\Formation;

class FormationController extends AbstractController
{
    #[Route('/formation', name: 'formation')]
    public function liste(Request $request, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Formation::class);
	    $lesFormations = $rep->findAll();
		
		return $this->render('formation/index.html.twig', Array('lesFormations' => $lesFormations));
    }
}