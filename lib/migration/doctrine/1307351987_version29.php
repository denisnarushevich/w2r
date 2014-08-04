<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version29 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('highlight_activity', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'number' => 
             array(
              'type' => 'integer',
              'length' => '8',
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
        $this->createTable('highlight_activity_translation', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'primary' => '1',
             ),
             'title' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'title_blue' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => '65535',
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
    }

    public function down()
    {
        $this->dropTable('highlight_activity');
        $this->dropTable('highlight_activity_translation');
    }
}