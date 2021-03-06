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
   * Check if the answer as argument is an accepted answer.
   *
   */
  public function checkAccepted($aid) {
    $q = Doctrine_Query::create()
      ->from('Accept a')
      ->where('a.answer_id = ?', $aid);

    return $q->fetchArray();
  }

  /**
   * Return the accepted answer for a question.
   *
   */
  public function getAccepted($qid) {
    $q = Doctrine_Query::create()
      ->from('Accept a')
      ->where('a.question_id = ?', $qid);

    return $q->fetchArray();
  }

  /**
   * Add a new row into the accept table
   *
   */
  public function addAccept($aid, $qid)
  {
    $q = new Accept();
    $q->question_id = $qid;
    $q->answer_id = $aid;

    $q->save();
    return $q;
  }

  /**
   * Add a new row into the accept table
   *
   */
  public function updateAccept($aid, $qid)
  {
    $q = Doctrine_Query::create()
      ->update('Accept a')
      ->set('a.answer_id', $aid)
      ->where('a.question_id = ?', $qid);

    $q->execute();
  }
}