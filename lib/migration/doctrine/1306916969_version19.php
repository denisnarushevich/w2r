<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version19 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('activity_price_translation', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'primary' => '1',
             ),
             'price' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'unsigned' => '1',
              'length' => '8',
             ),
             'lang' => 
             array(
              'fixed' => '1',
              'primary' => '1',
              'type' => 'string',
              'length' => '2',
             ),
             ), array(
             'type' => 'INNODB',
             'primary' => 
             array(
              0 => 'id',
              1 => 'lang',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->removeColumn('activity', 'default_price');
        $this->removeColumn('activity_price', 'price');
        $this->removeColumn('extra', 'price');
        $this->addColumn('activity_translation', 'default_price', 'integer', '8', array(
             'notnull' => '1',
             ));
        $this->addColumn('extra_translation', 'price', 'integer', '8', array(
             'notnull' => '1',
             'unsigned' => '1',
             ));
    }

    public function down()
    {
        $this->dropTable('activity_price_translation');
        $this->addColumn('activity', 'default_price', 'integer', '8', array(
             'notnull' => '1',
             ));
        $this->addColumn('activity_price', 'price', 'integer', '8', array(
             'notnull' => '1',
             'unsigned' => '1',
             ));
        $this->addColumn('extra', 'price', 'integer', '8', array(
             'notnull' => '1',
             'unsigned' => '1',
             ));
        $this->removeColumn('activity_translation', 'default_price');
        $this->removeColumn('extra_translation', 'price');
    }
}