<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version71 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('user', 'firstname', 'string', '80', array(
             ));
        $this->addColumn('user', 'lastname', 'string', '80', array(
             ));
        $this->addColumn('user', 'phone', 'string', '14', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('user', 'firstname');
        $this->removeColumn('user', 'lastname');
        $this->removeColumn('user', 'phone');
    }
}