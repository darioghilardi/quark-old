<?php

/**
 * AcceptTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AcceptTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object AcceptTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('Accept');
  }

  /**
   * Execute an update for the interested users counter.
   *
   */
  public function getAccepted($aid, $qid) {
    $q = Doctrine_Query::create()
      ->update('Answer a')
      ->set('a.votes','a.votes + ?', $amount)
      ->where('a.id = ?',$aid)
      ->execute();
  }
}