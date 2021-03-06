<?php

/**
 * BaseBonusPartner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $comment
 * @property string $value
 * @property string $type
 * @property integer $id_partner
 * @property string $code
 * @property Partners $Partners
 * 
 * @method string       getName()       Returns the current record's "name" value
 * @method string       getComment()    Returns the current record's "comment" value
 * @method string       getValue()      Returns the current record's "value" value
 * @method string       getType()       Returns the current record's "type" value
 * @method integer      getIdPartner()  Returns the current record's "id_partner" value
 * @method string       getCode()       Returns the current record's "code" value
 * @method Partners     getPartners()   Returns the current record's "Partners" value
 * @method BonusPartner setName()       Sets the current record's "name" value
 * @method BonusPartner setComment()    Sets the current record's "comment" value
 * @method BonusPartner setValue()      Sets the current record's "value" value
 * @method BonusPartner setType()       Sets the current record's "type" value
 * @method BonusPartner setIdPartner()  Sets the current record's "id_partner" value
 * @method BonusPartner setCode()       Sets the current record's "code" value
 * @method BonusPartner setPartners()   Sets the current record's "Partners" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBonusPartner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bonuspartner');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('comment', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('value', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('id_partner', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('code', 'string', 255, array(
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
        $this->hasOne('Partners', array(
             'local' => 'id_partner',
             'foreign' => 'id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'comment',
             ),
             ));
        $this->actAs($i18n0);
    }
}