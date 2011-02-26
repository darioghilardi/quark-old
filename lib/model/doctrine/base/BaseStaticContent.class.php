<?php

/**
 * BaseStaticContent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property varchar $path
 * @property string $body
 * 
 * @method integer       getId()    Returns the current record's "id" value
 * @method string        getTitle() Returns the current record's "title" value
 * @method varchar       getPath()  Returns the current record's "path" value
 * @method string        getBody()  Returns the current record's "body" value
 * @method StaticContent setId()    Sets the current record's "id" value
 * @method StaticContent setTitle() Sets the current record's "title" value
 * @method StaticContent setPath()  Sets the current record's "path" value
 * @method StaticContent setBody()  Sets the current record's "body" value
 * 
 * @package    quark
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStaticContent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('static_content');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('path', 'varchar', 50, array(
             'type' => 'varchar',
             'notnull' => true,
             'unique' => true,
             'length' => 50,
             ));
        $this->hasColumn('body', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}