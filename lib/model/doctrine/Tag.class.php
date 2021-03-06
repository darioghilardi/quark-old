<?php

/**
 * Tag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    quark
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Tag extends BaseTag
{
  /**
   * Extract the id of the corresponding tag.
   */
  public static function getTagIdByName($name)
  {
    $q = Doctrine_Query::create()
      ->from('Tag t')
      ->where('t.name = ?', $name)
      ->fetchOne();

    return $q['id'];
  }
  
  /**
   * Extract the name from the corresponding tag id.
   */
  public static function getTagNameByid($id)
  {
    $q = Doctrine_Query::create()
      ->from('Tag t')
      ->where('t.id = ?', $id)
      ->fetchOne();

    return $q['name'];
  }
}
