<?php

/**
 * BaseImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_object
 * @property string $type_object
 * @property string $path
 * 
 * @method integer getId()          Returns the current record's "id" value
 * @method integer getIdObject()    Returns the current record's "id_object" value
 * @method string  getTypeObject()  Returns the current record's "type_object" value
 * @method string  getPath()        Returns the current record's "path" value
 * @method Image   setId()          Sets the current record's "id" value
 * @method Image   setIdObject()    Sets the current record's "id_object" value
 * @method Image   setTypeObject()  Sets the current record's "type_object" value
 * @method Image   setPath()        Sets the current record's "path" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseImage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('image');
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
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
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