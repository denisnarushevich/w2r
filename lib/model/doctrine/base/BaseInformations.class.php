<?php

/**
 * BaseInformations
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $value
 * 
 * @method string       getName()  Returns the current record's "name" value
 * @method string       getValue() Returns the current record's "value" value
 * @method Informations setName()  Sets the current record's "name" value
 * @method Informations setValue() Sets the current record's "value" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseInformations extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('informations');
        $this->hasColumn('name', 'string', 65535, array(
             'type' => 'string',
             'length' => 65535,
             ));
        $this->hasColumn('value', 'string', 65535, array(
             'type' => 'string',
             'length' => 65535,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'value',
             ),
             ));
        $this->actAs($i18n0);
    }
}