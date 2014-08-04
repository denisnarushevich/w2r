<?php

/**
 * BaseActivityPrice
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_activity
 * @property integer $price
 * @property date $date_begin
 * @property date $date_end
 * @property Activity $Activity
 * 
 * @method integer       getId()          Returns the current record's "id" value
 * @method integer       getIdActivity()  Returns the current record's "id_activity" value
 * @method integer       getPrice()       Returns the current record's "price" value
 * @method date          getDateBegin()   Returns the current record's "date_begin" value
 * @method date          getDateEnd()     Returns the current record's "date_end" value
 * @method Activity      getActivity()    Returns the current record's "Activity" value
 * @method ActivityPrice setId()          Sets the current record's "id" value
 * @method ActivityPrice setIdActivity()  Sets the current record's "id_activity" value
 * @method ActivityPrice setPrice()       Sets the current record's "price" value
 * @method ActivityPrice setDateBegin()   Sets the current record's "date_begin" value
 * @method ActivityPrice setDateEnd()     Sets the current record's "date_end" value
 * @method ActivityPrice setActivity()    Sets the current record's "Activity" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseActivityPrice extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('activity_price');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_activity', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('price', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unsigned' => true,
             ));
        $this->hasColumn('date_begin', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('date_end', 'date', null, array(
             'type' => 'date',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Activity', array(
             'local' => 'id_activity',
             'foreign' => 'id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'price',
             ),
             ));
        $this->actAs($i18n0);
    }
}