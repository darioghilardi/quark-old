<?php

/**
 * Class voting
 *
 * Handle accepting for answers.
 */
class accepting
{
  function __construct($aid, $qid)
  {
    $this->id = $aid;
    $this->question_id = $qid;
  }

  /**
   * Show the links to accept an answer.
   *
   * @return string $up
   */
  public function preprocessAccepting($av)
  {
    if (!empty($av[0]['id']))
      return 'static';
    else
      return 'link';
  }

  /**
   * Execute the vote on a question.
   * 
   * @param int $sign
   */
  public function markAccepted($sign)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this user already voted this question
      $av = Doctrine_Core::getTable('Interest')->getInterestValue($this->user_id, $this->id);

      // Check if this entry is already into the table
      if(empty($av))
      {
        // Update the question interest entries count and update the interest table
        Doctrine_Core::getTable('Question')->updateQuestionInterest($this->id, $sign);
        // Update the interest table
        Doctrine_Core::getTable('Interest')->addInterest($this->user_id, $this->id, $sign);
      }
      elseif (($av[0]["value"] == '1') || ($av[0]["value"] == '0') || ($av[0]["value"] == '-1'))
      {
        $amount = (($av[0]["value"] == 0) ? 1 : 2) * $sign;
        // Update the question interest entries count
        Doctrine_Core::getTable('Question')->updateQuestionInterest($this->id, $amount);

        // Update the interest table
        Doctrine_Core::getTable('Interest')->updateInterest($this->user_id, $this->id, $sign);
      }

      // Commit the transaction
      $conn->commit();
    }
    catch (Exception $e)
    {
      // Rollback and exception
			$conn->rollBack();
			throw $e;
    }
  }
}

?>
