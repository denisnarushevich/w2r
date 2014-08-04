<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version3 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('booking', 'status', 'string', '20', array(
             'notnull' => '1',
             ));
        $this->changeColumn('card', 'card_name', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('card', 'card_numero', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('client', 'name', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('client', 'surname', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('image', 'type_object', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('image', 'path', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('planner', 'status', 'string', '20', array(
             'notnull' => '1',
             ));
        $this->changeColumn('activity_translation', 'name', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('activity_category_translation', 'name', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('extra_translation', 'name', 'string', '255', array(
             'notnull' => '1',
             ));
        $this->changeColumn('extra_category_translation', 'name', 'string', '255', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {

    }
}