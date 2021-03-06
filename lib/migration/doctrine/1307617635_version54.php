<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version54 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('review', 'review_id_client_client_id', array(
             'name' => 'review_id_client_client_id',
             'local' => 'id_client',
             'foreign' => 'id',
             'foreignTable' => 'client',
             ));
        $this->addIndex('review', 'review_id_client', array(
             'fields' => 
             array(
              0 => 'id_client',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('review', 'review_id_client_client_id');
        $this->removeIndex('review', 'review_id_client', array(
             'fields' => 
             array(
              0 => 'id_client',
             ),
             ));
    }
}