<?php

/**
 * UserActivationCodeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserActivationCodeTable extends PluginUserActivationCodeTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object UserActivationCodeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('UserActivationCode');
    }
}