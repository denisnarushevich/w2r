<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version65 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('planner', 'bonus_code', 'string', '255', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('planner', 'bonus_code');
    }
}