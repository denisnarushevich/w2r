<?php

/**
 * TransUnitTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TransUnitTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TransUnitTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TransUnit');
    }
    
    public function findPage($name, $lang)
    {
        $q = $this->createQuery('t')
                ->leftJoin('t.Catalogue c')
                ->where('c.name = ?', 'messages.' . $lang)
                ->andWhere('t.target = ?', $name);
        return $q->fetchOne();
    }
}