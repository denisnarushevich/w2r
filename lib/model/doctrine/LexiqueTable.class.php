<?php

/**
 * LexiqueTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LexiqueTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object LexiqueTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Lexique');
    }
    
    public function GetLexique($lang)
    {
      $q = $this->createQuery('l')
              ->leftJoin('l.Translation t')
              ->where('t.lang = ?', $lang)
              ->orderBy('t.name ASC');

      return $q->execute();
    }
}