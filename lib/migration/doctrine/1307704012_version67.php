<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version67 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('booking', 'booking_id_client_client_id');
        $this->dropForeignKey('card', 'card_id_client_client_id');
        $this->dropForeignKey('comment', 'comment_id_client_client_id');
        $this->dropForeignKey('planner', 'planner_id_client_client_id');
        $this->dropForeignKey('review', 'review_id_client_client_id');
        $this->dropTable('client');
    }

    public function down()
    {
        $this->createTable('client', array(
             'id' => 
             array(
              'type' => 'integer',
              'primary' => '1',
              'autoincrement' => '1',
              'length' => '8',
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
             'email' => 
             array(
              'type' => 'varchar',
              'length' => '255',
             ),
             'mdp' => 
             array(
              'type' => 'varchar',
              'length' => '255',
             ),
             'hash' => 
             array(
              'type' => 'varchar',
              'length' => '255',
             ),
             'phone' => 
             array(
              'type' => 'varchar',
              'notnull' => '1',
              'length' => '14',
             ),
             ), array(
             'type' => 'INNODB',
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
        $this->createForeignKey('booking', 'booking_id_client_client_id', array(
             'name' => 'booking_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
        $this->createForeignKey('card', 'card_id_client_client_id', array(
             'name' => 'card_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
        $this->createForeignKey('comment', 'comment_id_client_client_id', array(
             'name' => 'comment_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
        $this->createForeignKey('planner', 'planner_id_client_client_id', array(
             'name' => 'planner_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
        $this->createForeignKey('review', 'review_id_client_client_id', array(
             'name' => 'review_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
    }
}