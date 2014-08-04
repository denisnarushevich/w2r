<?php

/**
 * BaseExtraCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property text $description
 * @property boolean $del
 * @property Doctrine_Collection $Extra
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method string              getName()        Returns the current record's "name" value
 * @method text                getDescription() Returns the current record's "description" value
 * @method boolean             getDel()         Returns the current record's "del" value
 * @method Doctrine_Collection getExtra()       Returns the current record's "Extra" collection
 * @method ExtraCategory       setId()          Sets the current record's "id" value
 * @method ExtraCategory       setName()        Sets the current record's "name" value
 * @method ExtraCategory       setDescription() Sets the current record's "description" value
 * @method ExtraCategory       setDel()         Sets the current record's "del" value
 * @method ExtraCategory       setExtra()       Sets the current record's "Extra" collection
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseExtraCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('extra_category');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('del', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Extra', array(
             'local' => 'id',
             'foreign' => 'id_category'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'description',
              2 => 'visible',
             ),
             ));
        $sluggable1 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'uniqueBy' => 
             array(
              0 => 'lang',
              1 => 'name',
             ),
             ));
        $i18n0->addChild($sluggable1);
        $this->actAs($i18n0);
    }
}