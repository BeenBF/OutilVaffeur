<?php // src/Controller/EnvController.php

namespace App\Controller;

use App\Entity\DataStif;
use App\Entity\DataOlaf;
use App\Entity\DataOpm;
use App\Entity\DataCtu;
use App\Entity\Environnement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Historique extends AbstractController
{
    public function showAll(EntityManagerInterface $em, string $nomCourt, string $environnement): Response
    {
			
		$envs = $em->getRepository(Environnement::class)->findActive();
		$env = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		if($environnement =="STIF")
		{
			$dataStif = $em->getRepository(DataStif::class)->findDataStifHisto($nomCourt);
			 return $this->render('historique/historiqueHome.html.twig', [
            'dataStif' 	=> $dataStif,
			'environnements' =>$envs,	
			'nomCourt' => $env[0]->getNomCourt(),
			'nomLong' => $env[0]->getNomLong(),
			'typeEnv' => $env[0]->getTypeEnv(),
			]);
		}
		elseif($environnement =="OLAF")
		{
			$dataOlaf = $em->getRepository(DataOlaf::class)->findDataOlafHisto($nomCourt);
			
			return $this->render('historique/historiqueHome.html.twig', [
            'dataOlaf' 	=> $dataOlaf,
			'environnements' =>$envs,	
			'nomCourt' => $env[0]->getNomCourt(),
			'nomLong' => $env[0]->getNomLong(),
			'typeEnv' => $env[0]->getTypeEnv(),
			]);
		}
		elseif($environnement =="OPM")
		{
			$dataOpm = $em->getRepository(DataOpm::class)->findDataOpmHisto($nomCourt);
			 return $this->render('historique/historiqueHome.html.twig', [
            'dataOpm' 	=> $dataOpm,
			'environnements' =>$envs,	
			'nomCourt' => $env[0]->getNomCourt(),
			'nomLong' => $env[0]->getNomLong(),
			'typeEnv' => $env[0]->getTypeEnv(),
			]);
		}
		elseif($environnement =="CTU")
		{
			$dataCtu = $em->getRepository(DataCtu::class)->findDataCtuHisto($nomCourt);
			 return $this->render('historique/historiqueHome.html.twig', [
            'dataCtu' 	=> $dataCtu,
			'environnements' =>$envs,	
			'nomCourt' => $env[0]->getNomCourt(),
			'nomLong' => $env[0]->getNomLong(),
			'typeEnv' => $env[0]->getTypeEnv(),
			]);
		}
    }
	
	public function showEnvHisto(EntityManagerInterface $em): Response
    {
       	$envs = $em->getRepository(Environnement::class)->findActive();

        return $this->render('historique/historiqueHome.html.twig', [
            'environnements' => $envs,
        ]);
    }

}

?>