<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version59 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('video', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '8',
             ),
             'id_object' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'type_object' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'content' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
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
        $this->dropTable('video');
    }
}