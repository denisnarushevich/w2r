<?php

/**
 * BaseCard
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_client
 * @property string $card_name
 * @property string $card_numero
 * @property date $valid_to
 * @property User $User
 * 
 * @method integer getId()          Returns the current record's "id" value
 * @method integer getIdClient()    Returns the current record's "id_client" value
 * @method string  getCardName()    Returns the current record's "card_name" value
 * @method string  getCardNumero()  Returns the current record's "card_numero" value
 * @method date    getValidTo()     Returns the current record's "valid_to" value
 * @method User    getUser()        Returns the current record's "User" value
 * @method Card    setId()          Sets the current record's "id" value
 * @method Card    setIdClient()    Sets the current record's "id_client" value
 * @method Card    setCardName()    Sets the current record's "card_name" value
 * @method Card    setCardNumero()  Sets the current record's "card_numero" value
 * @method Card    setValidTo()     Sets the current record's "valid_to" value
 * @method Card    setUser()        Sets the current record's "User" value
 * 
 * @package    stag
 * @subpackage model
 * @author     Rainmaker
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCard extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('card');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_client', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('card_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('card_numero', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('valid_to', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_general_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'id_client',
             'foreign' => 'id'));
    }
}