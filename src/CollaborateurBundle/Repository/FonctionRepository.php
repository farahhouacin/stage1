<?php

namespace CollaborateurBundle\Repository;

/**
 * FonctionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FonctionRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNb()
    {
        return $this->createQueryBuilder('fonction')
            ->select('COUNT(fonction.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
