<?php // src/Controller/PassController.php

namespace App\Controller;

use App\Entity\DataStif;
use App\Entity\DataOlaf;
use App\Entity\DataOpm;
use App\Entity\DataCtu;
use App\Entity\Environnement;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\PdoAdapter;
//use APP\Controler\PDOOCI\PDO;

class PassController extends AbstractController
{
    	
	 public function showPassSic(EntityManagerInterface $em, Request $request): Response
    {
		#Recupération des données du formulaire
		$numPass = intval($request->get('numPass'));
		 if((null === $numPass) || empty($numPass))
		{
			return $this->redirectToRoute('recette_error',array('erreur' => 'Renseignez Le Numéro De Pass.'));
		} 
		
		$nomCourt = $request->get('envTest');
		if((null === $nomCourt) || empty($nomCourt))
		{
			return $this->redirectToRoute('recette_error',array('erreur' => "Sélectionnez L'environnement."));
		}
		
		$envs = $em->getRepository(Environnement::class)->findEnvByNomCourt($nomCourt);
		
		if (null === $envs || empty($envs)) {
			return $this->redirectToRoute('recette_error',array('erreur' => "L'environnement ne semble pas exister."));
        }
		
		/* Recuperation des varibales d'env pour la connexion aux BDD Ora 8 */
		$paramEnv=$this->getParameter(strtolower($nomCourt));

		$db = new \PDO('oci:dbname='.$paramEnv['url'].'',$paramEnv['user'],$paramEnv['mdp']);
		/***
		Recuperation des données en provenance des SIC		
		TO_CHAR('DATE_VAL','YYYY-MM-DD HH24:MI:SS')
		*/
		$query="SELECT ".
					$paramEnv['champs']." ".
					"FROM ".$paramEnv['table']." ".
					"WHERE ".$paramEnv['champRech']."='".$numPass."'";
				
		$dataSic=$db->query($query);
		$dataSic2=$db->query($query);

		if (null === $dataSic || empty($dataSic)) {

			$dataSic=false;
        }
		
		$i=0;
		foreach($dataSic as $data)
		{
			$listeHeure[$i]=$data[$paramEnv['champHeure']]; //->format('Y-m-d H:i:s');
			$i++;
		}
		if( !isset($listeHeure) )
		{
			return $this->redirectToRoute('recette_error',array('erreur' => 'Aucune Validation pour ce Pass'));
		}
		
		$dataCtu= $em->getRepository(DataCtu::class)->findDataCtuByPass($nomCourt,$numPass);
		if ((null === $dataCtu) || empty($dataCtu)) 
		{
			$dataCtu=false;
        }
		
		$dataStif = $em->getRepository(DataStif::class)->findDataStifByHeure($nomCourt,$listeHeure);
        if (null === $dataStif || empty($dataStif)) {
			$dataStif=false;
        }
		
				
		$dataOlaf = $em->getRepository(DataOlaf::class)->findDataOlafByHeure($nomCourt,$listeHeure);
        if (null === $dataOlaf || empty($dataOlaf)) {
			$dataOlaf=false;
        }
		
		$dataOpm = $em->getRepository(DataOpm::class)->findDataOpmByHeure($nomCourt,$listeHeure);
        if (null === $dataOpm || empty($dataOpm)) {
			$dataOpm=false;
        }
		
        return $this->render('pass/showByPassSIC.html.twig', [
            'dataStif' 	=> $dataStif,
			'dataOlaf' 	=> $dataOlaf,
			'dataSic'	=> $dataSic2,
			'dataCtu'	=> $dataCtu,
			'dataOpm'	=> $dataOpm,
			'nomCourt' 	=> $envs[0]->getNomCourt(),
			'nomLong' 	=> $envs[0]->getNomLong(),
			'numPass'	=> $numPass,
			'typeEnv' 	=> $envs[0]->getTypeEnv(),
        ]);
    }	
	
}

?>