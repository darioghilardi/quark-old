<?php

/**
 * PluginsfGuardUserProfileTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginsfGuardUserProfileTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PluginsfGuardUserProfileTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PluginsfGuardUserProfile');
    }

    /**
     * returns query for all sfGuardProfileTable that have validation codes set
     * @param Doctrine_Query $query
     * @return Doctrine_Query
     * @author Grzegorz Śliwiński
     */
    public function getProfilesWithValidationCodesQuery( Doctrine_Query $query = null )
    {
        if( !$query )
        {
            $query = $this->createQuery( 'p' );
        }
        return $query->andWhere( $query->getRootAlias().'.validate IS NOT NULL' );
    }

    public function getProfilesWithUserQuery( Doctrine_Query $query = null )
    {
        if( !$query )
        {
            $query = $this->createQuery( 'p' );
        }
        return $query->leftJoin( $query->getRootAlias().'.User u' );
    }
}