<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version76 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('bonuspartner', 'type', 'string', '255', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('bonuspartner', 'type');
    }
}