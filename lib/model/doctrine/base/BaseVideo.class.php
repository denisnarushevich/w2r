<?php

/**
 * BaseVideo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_object
 * @property string $type_object
 * @property string $content
 * 
 * @method integer getId()          Returns the current record's "id" value
 * @method integer getIdObject()    Returns the current record's "id_object" value
 * @method string  getTypeObject()  Returns the current record's "type_object" value
 * @method string  getContent()     Returns the current record's "content" value
 * @method Video   setId()          Sets the current record's "id" value
 * @method Video   setIdObject()    Sets the current record's "id_object" value
 * @method Video   setTypeObject()  Sets the current record's "type_object" value
 * @method Video   setContent()     Sets the current record's "content" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVideo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('video');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_object', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('type_object', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('content', 'string', 65355, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 65355,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}