<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version33 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('activity_translation', 'default_price');
        $this->addColumn('activity', 'default_price', 'integer', '8', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->addColumn('activity_translation', 'default_price', 'integer', '8', array(
             'notnull' => '1',
             ));
        $this->removeColumn('activity', 'default_price');
    }
}