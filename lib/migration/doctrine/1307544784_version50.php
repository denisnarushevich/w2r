<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version50 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('activity_translation', 'summary', 'text', '', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('activity_translation', 'summary');
    }
}