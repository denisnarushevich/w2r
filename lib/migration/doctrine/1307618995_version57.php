<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version57 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('review', 'image', 'string', '255', array(
             ));
    }

    public function down()
    {

    }
}