<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version80 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('informations_translation', 'name', 'string', '65535', array(
             ));
        $this->changeColumn('informations_translation', 'value', 'string', '65535', array(
             ));
    }

    public function down()
    {

    }
}