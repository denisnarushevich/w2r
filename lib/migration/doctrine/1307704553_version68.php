<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version68 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('user', 'id', 'integer', '8', array(
             'primary' => '1',
             'autoincrement' => '1',
             ));
    }

    public function down()
    {
        $this->changeColumn('user', 'id', 'integer', '4', array(
             'primary' => '1',
             'autoincrement' => '1',
             ));
    }
}