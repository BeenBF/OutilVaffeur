<?php // src/Repository/DataCtuRepository.php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Environnement;
use Doctrine\ORM\EntityRepository;

class DataCtuRepository extends EntityRepository
{
    public function findDataCtuByEnv(string $nomCourt)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.env = :environnement')
            ->setParameter('environnement', $nomCourt)
			->orderBy('j.horodatage', 'DESC')
			->setMaxResults( 100 )
            ->getQuery()
            ->getResult();
    }
	
	public function findDataCtuFull(string $nomCourt)
    {
         //recherche sur les 60 derniers jours
		$date= date('Y-m-d', strtotime( "-60 day") );
		
		return $this->createQueryBuilder('j')
            ->andWhere('j.env = :environnement')
			->andWhere('j.date_integ > :date')
            ->setParameter('environnement', $nomCourt)
			->setParameter('date', $date)
			->orderBy('j.horodatage', 'DESC')
			->getQuery()
            ->getResult();
    }
	
	public function findDataCtuHisto(string $nomCourt)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.env = :environnement')
            ->setParameter('environnement', $nomCourt)
			->orderBy('j.horodatage', 'DESC')
            ->getQuery()
            ->getResult();
    }
	public function findDataCtuByPass(string $nomCourt, string $numPass)
	{
		return $this->createQueryBuilder('j')
		->andWhere('j.env = :environnement')
		->andWhere('j.num_pass LIKE :numPass')
		->setParameter('environnement', $nomCourt)
		->setParameter('numPass', "%".$numPass."%")
		->getQuery()
		->getResult();
	}
}

?>