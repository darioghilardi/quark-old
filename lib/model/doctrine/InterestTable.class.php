<?php

/**
 * InterestTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class InterestTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object InterestTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('Interest');
  }

  /**
   * Returns the value of the previously added vote, if exists
   *
   * @return object InterestTable
   */
  public function getInterestValue($user_id, $qid)
  {
    $q = Doctrine_Query::create()
      ->select('i.value')
      ->from('Interest i')
      ->where('i.user_id = ?', $user_id)
      ->andWhere('i.question_id = ?', $qid);

    return $q->fetchArray();
  }

  /**
   * Execute an update to a row into the interest table
   *
   */
  public function updateInterest($user_id, $qid, $amount)
  {
    $q = Doctrine_Query::create()
      ->update('Interest i')
      ->set('i.value', $amount)
      ->where('i.user_id = ?', $user_id)
      ->andWhere('i.question_id = ?', $qid);

    $q->execute();
  }

  /**
   * Add a new row into the interest table
   *
   */
  public function addInterest($user_id, $qid, $amount)
  {
    $q = new Interest();
    $q->value = $amount;
    $q->question_id = $qid;
    $q->user_id = $user_id;

    $q->save();
    return $q->id;
  }
}