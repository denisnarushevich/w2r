<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version11 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('activity', 'id_category', 'integer', '8', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {

    }
}