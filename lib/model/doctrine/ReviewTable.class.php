<?php

/**
 * ReviewTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ReviewTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ReviewTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Review');
    }
    
    public function getReviews()
    {
      $q = $this->createQuery('r')
        ->leftJoin('r.User c')
        ->where('r.valide = ?', true)
        ->andWhere('r.del = ?', false);

      return $q;
    }
}