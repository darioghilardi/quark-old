<?php

/**
 * AnswerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnswerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AnswerTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Answer');
    }

  /**
   * Execute an update for the interested users counter.
   *
   */
  public function updateAnswerRating($aid, $amount) {
    $q = Doctrine_Query::create()
      ->update('Answer a')
      ->set('a.votes','a.votes + ?', $amount)
      ->where('a.id = ?',$aid)
      ->execute();
  }
}