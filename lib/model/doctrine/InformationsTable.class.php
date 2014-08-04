<?php

/**
 * InformationsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class InformationsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object InformationsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Informations');
    }
    
    public function getDataFor($name)
    {
      $q = $this->createQuery('i')
                ->leftJoin('i.Translation t')
                ->where('t.name = ?', $name);
      return $q->fetchOne();
    }
    
    public function getDataForLang($name, $lang)
    {
      $q = $this->createQuery('i')
                ->leftJoin('i.Translation t')
                ->where('t.name = ?', $name)
                ->andWhere('t.lang = ?', $lang);
      return $q->fetchOne();
    }
}