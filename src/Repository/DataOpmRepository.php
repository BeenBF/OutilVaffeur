<?php // src/Repository/DataOpmRepository.php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Environnement;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class DataOpmRepository extends EntityRepository
{
    public function findDataOpmByEnv(string $nomCourt)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.env = :environnement')
            ->setParameter('environnement', $nomCourt)
			->orderBy('j.horodatage', 'DESC')
			->setMaxResults( 100 )
            ->getQuery()
            ->getResult();
    }
	
	public function findDataOpmFull(string $nomCourt)
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
	
	public function findDataOpmHisto(string $nomCourt)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.env = :environnement')
            ->setParameter('environnement', $nomCourt)
			->orderBy('j.horodatage', 'DESC')
            ->getQuery()
            ->getResult();
    }
	
	public function findDataOpmByHeure(string $nomCourt,array $heure)
	{
		return $this->createQueryBuilder('j')
			->setParameters(array(
				1 => $nomCourt,
				2 => $heure
			))
			->add('where',$this->createQueryBuilder('j')->expr()->andX(
				$this->createQueryBuilder('j')->expr()->eq('j.env','?1'),
				$this->createQueryBuilder('j')->expr()->in('j.horodatage','?2')
			))
			->getQuery()
            ->getResult();
    }
}

?>