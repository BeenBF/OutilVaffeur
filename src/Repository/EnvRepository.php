<?php // src/Repository/EnvRepository.php

namespace App\Repository;

use DateTime;
use APP\Entity\Environnement;
use Doctrine\ORM\EntityRepository;
 
class EnvRepository extends EntityRepository
{
    public function findActive()
    {
        return $this->createQueryBuilder('j')
            ->orderBy('j.typeEnv', 'DESC')
			->getQuery()
            ->getResult();
    }
	public function findEnvByNomCourt($nomCourt)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.nomCourt = :nomCourt')
            ->setParameter('nomCourt', $nomCourt)
			->getQuery()
            ->getResult();
    }
}

?>