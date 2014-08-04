<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version49 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('contact', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'email' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'surname' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'comment' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '65535',
             ),
             ), array(
             'type' => 'INNODB',
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('contact');
    }
}