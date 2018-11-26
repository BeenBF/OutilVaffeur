<?php // src/Controller/HomeController.php

namespace App\Controller;

use App\Entity\Environnement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 

class HomeController extends AbstractController
{
	public function home(EntityManagerInterface $em): Response
    {
       	//$em = $this->getDoctrine()->getManager('default');
		$envs = $em->getRepository(Environnement::class)->findActive();
					
        return $this->render('home.html.twig', [
            'environnements' => $envs,
        ]);
    }
	
	public function homeError($erreur,EntityManagerInterface $em): Response
    {
       	$envs = $em->getRepository(Environnement::class)->findActive();
		$msgErreur = $erreur;
				
        return $this->render('home.html.twig', [
            'environnements' => $envs,
			'erreur'		=> $msgErreur,
        ]);
    }
}

?>