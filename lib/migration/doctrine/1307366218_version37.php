<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version37 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('lexique_translation', 'lexique_translation_id_lexique_lexique_id_lexique', array(
             'name' => 'lexique_translation_id_lexique_lexique_id_lexique',
             'local' => 'id_lexique',
             'foreign' => 'id_lexique',
             'foreignTable' => 'lexique',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('lexique_translation', 'lexique_translation_id_lexique', array(
             'fields' => 
             array(
              0 => 'id_lexique',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('lexique_translation', 'lexique_translation_id_lexique_lexique_id_lexique');
        $this->removeIndex('lexique_translation', 'lexique_translation_id_lexique', array(
             'fields' => 
             array(
              0 => 'id_lexique',
             ),
             ));
    }
}