<?php // src/Controller/EnvController.php

namespace App\Controller;

use App\Entity\DataStif;
use App\Entity\DataOlaf;
use App\Entity\DataOpm;
use App\Entity\DataCtu;
use App\Entity\Environnement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EnvController extends AbstractController
{
    public function show(EntityManagerInterface $em, string $nomCourt): Response
    {
		$envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		$dataStif = $em->getRepository(DataStif::class)->findDataStifByEnv($nomCourt);
        if (null === $dataStif) {
            throw new NotFoundHttpException();
        }
		
		$dataOlaf = $em->getRepository(DataOlaf::class)->findDataOlafByEnv($nomCourt);
        if (null === $dataOlaf) {
            throw new NotFoundHttpException();
        }
		
		$dataOpm = $em->getRepository(DataOpm::class)->findDataOpmByEnv($nomCourt);
        if (null === $dataOpm) {
            throw new NotFoundHttpException();
        }
		
		$dataCtu = $em->getRepository(DataCtu::class)->findDataCtuByEnv($nomCourt);
        if (null === $dataCtu) {
            throw new NotFoundHttpException();
        }
		
        return $this->render('env/show.html.twig', [
            'dataStif' 	=> $dataStif,
			'dataOlaf' 	=> $dataOlaf,
			'dataOpm'	=> $dataOpm,
			'dataCtu' 	=> $dataCtu,
			'nomCourt' => $envs[0]->getNomCourt(),
			'typeEnv' => $envs[0]->getTypeEnv(),
        ]);
    }
	
	/*Récupération et afficahge des données Stif pour un environnemùent donné*/
	public function showStif(EntityManagerInterface $em, string $nomCourt): Response
    {
        $envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		$dataStif = $em->getRepository(DataStif::class)->findDataStifFull($nomCourt);
        if (null === $dataStif) {
            throw new NotFoundHttpException();
        }
		
        return $this->render('env/showFullStif.html.twig', [
            'dataStif' => $dataStif,
			'nomCourt' => $envs[0]->getNomCourt(),
			'typeEnv' => $envs[0]->getTypeEnv(),
        ]);
    }
	
	/*Récupération et afficahge des données Olaf pour un environnemùent donné*/
	public function showOlaf(EntityManagerInterface $em, string $nomCourt): Response
    {
        $envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		$dataOlaf = $em->getRepository(DataOlaf::class)->findDataOlafFull($nomCourt);
        if (null === $dataOlaf) {
            throw new NotFoundHttpException();
        }
		
        return $this->render('env/showFullOlaf.html.twig', [
            'dataOlaf' => $dataOlaf,
			'nomCourt' => $envs[0]->getNomCourt(),
			'typeEnv' => $envs[0]->getTypeEnv(),
        ]);
    }
	
	/*Récupération et affichage des données Optimus pour un environnemùent donné*/
	public function showOptimus(EntityManagerInterface $em, string $nomCourt): Response
    {
        $envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		$dataOpm = $em->getRepository(DataOpm::class)->findDataOpmFull($nomCourt);
        if (null === $dataOpm) {
            throw new NotFoundHttpException();
        }
		
        return $this->render('env/showFullOpm.html.twig', [
            'dataOpm' => $dataOpm,
			'nomCourt' => $envs[0]->getNomCourt(),
			'typeEnv' => $envs[0]->getTypeEnv(),
        ]);
    }
	
	/*Récupération et affichage des données Post Paiement pour un environnemùent donné*/
	public function showCtu(EntityManagerInterface $em, string $nomCourt): Response
    {
        $envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		$dataCtu = $em->getRepository(DataCtu::class)->findDataCtuFull($nomCourt);
        if (null === $dataCtu) {
            throw new NotFoundHttpException();
        }
		
        return $this->render('env/showFullCtu.html.twig', [
            'dataCtu' => $dataCtu,
			'nomCourt' => $envs[0]->getNomCourt(),
			'typeEnv' => $envs[0]->getTypeEnv(),
        ]);
    }
}

?>