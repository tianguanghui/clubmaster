<?php

namespace Club\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BanRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BanRepository extends EntityRepository
{
  public function findAllExpired()
  {
    return $this->_em->createQueryBuilder()
      ->select('b')
      ->from('ClubUserBundle:Ban','b')
      ->where('b.expire_date < :date')
      ->setParameter('date',date('Y-m-d H:is:'))
      ->getQuery()
      ->getResult();
  }
}