<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $email_new
 * @property string $firstname
 * @property string $lastname
 * @property timestamp $validate_at
 * @property string $validate
 * @property string $type
 * @property integer $reputation
 * @property string $biography
 * @property string $location
 * @property string $website
 * @property integer $age
 * @property sfGuardUser $User
 * 
 * @method integer            getUserId()      Returns the current record's "user_id" value
 * @method string             getEmailNew()    Returns the current record's "email_new" value
 * @method string             getFirstname()   Returns the current record's "firstname" value
 * @method string             getLastname()    Returns the current record's "lastname" value
 * @method timestamp          getValidateAt()  Returns the current record's "validate_at" value
 * @method string             getValidate()    Returns the current record's "validate" value
 * @method string             getType()        Returns the current record's "type" value
 * @method integer            getReputation()  Returns the current record's "reputation" value
 * @method string             getBiography()   Returns the current record's "biography" value
 * @method string             getLocation()    Returns the current record's "location" value
 * @method string             getWebsite()     Returns the current record's "website" value
 * @method integer            getAge()         Returns the current record's "age" value
 * @method sfGuardUser        getUser()        Returns the current record's "User" value
 * @method sfGuardUserProfile setUserId()      Sets the current record's "user_id" value
 * @method sfGuardUserProfile setEmailNew()    Sets the current record's "email_new" value
 * @method sfGuardUserProfile setFirstname()   Sets the current record's "firstname" value
 * @method sfGuardUserProfile setLastname()    Sets the current record's "lastname" value
 * @method sfGuardUserProfile setValidateAt()  Sets the current record's "validate_at" value
 * @method sfGuardUserProfile setValidate()    Sets the current record's "validate" value
 * @method sfGuardUserProfile setType()        Sets the current record's "type" value
 * @method sfGuardUserProfile setReputation()  Sets the current record's "reputation" value
 * @method sfGuardUserProfile setBiography()   Sets the current record's "biography" value
 * @method sfGuardUserProfile setLocation()    Sets the current record's "location" value
 * @method sfGuardUserProfile setWebsite()     Sets the current record's "website" value
 * @method sfGuardUserProfile setAge()         Sets the current record's "age" value
 * @method sfGuardUserProfile setUser()        Sets the current record's "User" value
 * 
 * @package    quark
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('email_new', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('firstname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('validate_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('validate', 'string', 33, array(
             'type' => 'string',
             'length' => 33,
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('reputation', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('biography', 'string', 500, array(
             'type' => 'string',
             'length' => 500,
             ));
        $this->hasColumn('location', 'string', 75, array(
             'type' => 'string',
             'length' => 75,
             ));
        $this->hasColumn('website', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('age', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('user_id_unique', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             'type' => 'unique',
             ));
        $this->setSubClasses(array(
             'UserProfile' => 
             array(
              'type' => 'UserProfile',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}