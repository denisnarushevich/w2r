<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version30 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('highlight_activity_translation', 'highlight_activity_translation_id_highlight_activity_id', array(
             'name' => 'highlight_activity_translation_id_highlight_activity_id',
             'local' => 'id',
             'foreign' => 'id',
             'foreignTable' => 'highlight_activity',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('highlight_activity_translation', 'highlight_activity_translation_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('highlight_activity_translation', 'highlight_activity_translation_id_highlight_activity_id');
        $this->removeIndex('highlight_activity_translation', 'highlight_activity_translation_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }
}