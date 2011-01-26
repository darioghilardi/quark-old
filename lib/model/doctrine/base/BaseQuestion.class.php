<?php

/**
 * BaseQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $body
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property User $User
 * @property Doctrine_Collection $ask_question
 * @property Doctrine_Collection $Interest
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getUserId()       Returns the current record's "user_id" value
 * @method string              getTitle()        Returns the current record's "title" value
 * @method string              getBody()         Returns the current record's "body" value
 * @method timestamp           getCreatedAt()    Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()    Returns the current record's "updated_at" value
 * @method User                getUser()         Returns the current record's "User" value
 * @method Doctrine_Collection getAskQuestion()  Returns the current record's "ask_question" collection
 * @method Doctrine_Collection getInterest()     Returns the current record's "Interest" collection
 * @method Question            setId()           Sets the current record's "id" value
 * @method Question            setUserId()       Sets the current record's "user_id" value
 * @method Question            setTitle()        Sets the current record's "title" value
 * @method Question            setBody()         Sets the current record's "body" value
 * @method Question            setCreatedAt()    Sets the current record's "created_at" value
 * @method Question            setUpdatedAt()    Sets the current record's "updated_at" value
 * @method Question            setUser()         Sets the current record's "User" value
 * @method Question            setAskQuestion()  Sets the current record's "ask_question" collection
 * @method Question            setInterest()     Sets the current record's "Interest" collection
 * 
 * @package    quark
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuestion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('question');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('body', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Answer as ask_question', array(
             'local' => 'id',
             'foreign' => 'question_id'));

        $this->hasMany('Interest', array(
             'local' => 'id',
             'foreign' => 'question_id'));
    }
}